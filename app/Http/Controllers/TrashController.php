<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrashController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Teacher::onlyTrashed()->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-green-500 bg-green-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-green-800 focus:outline-none focus:shadow-outline"
                            href="' . route('trash.restore', $item->id) . '">
                            Restore
                        </a>

                        <a class="inline-block border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-1 font-semibold transition duration-500 ease select-none hover:bg-red-800 focus:outline-none focus:shadow-outline"
                            href="' . route('trash.permanently', $item->id) . '">
                            Hapus Permanen
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.trash.index');
    }

    // delete restore
    public function restore($id)
    {
        $data = Teacher::onlyTrashed()->where('id', $id);
        $data->restore();

        // alert
        alert()->success('Successfully Restore', 'Teacher data has been successfully recovered!');

        return redirect()->route('trash.index');
    }

    // delete permanently
    public function delete_permanently($id)
    {
        $data = Teacher::onlyTrashed()->where('id', $id);
        $data->forceDelete();

        // alert
        alert()->success('Successfully Delete Permanently', 'Teacher data has been successfully delete permanently!');

        return redirect()->route('trash.index');
    }
}
