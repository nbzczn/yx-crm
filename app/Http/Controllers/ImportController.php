<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $clientName = $file->getClientOriginalName();
                    if (!in_array($extension, ['xls', 'xlsx'])) {
                        return redirect('/import')->withErrors('文件格式不正确');
                    }
                    $newName = md5(date('ymdhis') . $clientName) . "." . $extension;
                    $path = $file->move('storage/uploads', $newName);
                    $i = 0;
                    $j = 0;
                    Excel::load($path, function($reader) use (&$i, &$j) {
                        // Loop through all sheets
                        $reader->each(function($row) use (&$i, &$j) {
                            $rowArr = $row->toArray();
                            $name = $rowArr[1];
                            $address = $rowArr[2];
                            $description = $rowArr[3];
                            $contact = $rowArr[5];
                            $j++ ;

                            if (!Company::where('name', $name)->first()){
                                $model = new Company;
                                $model->name = $name;
                                $model->address = $address;
                                $model->description = $description;
                                $model->contact = $contact;
                                $model->is_contact = 'N';
                                $model->save();
                                $i++ ;
                            }
                        });
                    });

                    $c = $j - $i;

                    return redirect('/import')->with('success', $clientName . '导入成功，共 ' . $j . ' 条数据，' . '成功保存 '. $i . ' 条数据，去除重复数据 ' . $c . ' 条');
                }else{
                    return redirect('/import')->withErrors('文件传输失败');
                }
            }else{
                return redirect('/import')->withErrors('请选择一个excel文件');
            }
        } else {
            return view('import');
        }
    }
}
