<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.index');
    }

    public function data()
    {
        $member = Member::select('member.*')
            ->orderBy('id_member', 'asc')->get();

        return dataTables()
            ->of($member)
            ->addIndexColumn()
            ->addColumn('select_all', function ($member) {
                return '
                    <input type="checkbox" name="id_member[]" value="' . $member->id_member . '">
                ';
            })
            ->addColumn('kode_member', function ($member) {
                return '<span class="label label-success">' . $member->kode_member . '</span>';
            })
            ->addColumn('aksi', function ($member) {
                return '
                    <div class="btn-group">
                        <button type="button" onclick="editForm(`' . route('member.update', $member->id_member) . '`)" class="btn xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                        <button type="button" onclick="deleteData(`' . route('member.destroy', $member->id_member) . '`)" class="btn xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    </div>
                ';
            })
            ->rawColumns(['aksi', 'kode_member', 'select_all'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $member_terakhir = Member::latest()->first();
        $kode_baru = 'M' . tambah_nol_didepan((int)optional($member_terakhir)->id_member + 1, 6);

        $data = $request->only([
            'nama',
            'alamat',
            'telepon'
        ]);
        $data['kode_member'] = $kode_baru;

        Member::create($data);

        return response()->json('Data berhasil ditambahkan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::find($id);

        return response()->json($member);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Member::find($id);
        $produk->update($request->all());

        return response()->json('Data berhasil Update', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);
        $member->delete();

        return response(null, 204);
    }
    public function cetakMember(Request $request)
    {
        $datamember = collect(array());
        foreach ($request->id_member as $id) {
            $member = Member::find($id);
            $datamember[] = $member;
        }

        $setting = Setting::first();
        $no = 1;
        $datamember = $datamember->chunk(2);
        $pdf = Pdf::loadView('member.cetak', compact('datamember', 'no', 'setting'));
        $pdf->setPaper(array(0, 0, 566.93, 850.39), 'potrait');
        return $pdf->stream('$member.pdf');
    }
}
