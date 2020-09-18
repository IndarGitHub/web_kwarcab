<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;
use App\Repositories\PendaftaranRepository;
use App\Http\Controllers\AppBaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
// use Alert;
use Response;
use File;
use Carbon\Carbon;
use Auth;

class PendaftaranController extends AppBaseController
{
    /** @var  PendaftaranRepository */
    private $pendaftaranRepository;

    public function __construct(PendaftaranRepository $pendaftaranRepo)
    {
        
        $this->pendaftaranRepository = $pendaftaranRepo;
        $this->buktiPembayaran = public_path('bukti_pembayaran');
        $this->uploadberkas = public_path('bukti_berkas');
    }

    /**
     * Display a listing of the Pendaftaran.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pendaftarans = $this->pendaftaranRepository->all();

        return view('pendaftarans.index')
            ->with('pendaftarans', $pendaftarans);
    }

    /**
     * Show the form for creating a new Pendaftaran.
     *
     * @return Response
     */
    public function create()
    {
        $ktas = \App\Models\Kta::pluck('name','id');
        $tingkatans = \App\Models\Tingkatan::pluck('tingkatan','id');
        $users = \App\Models\User::where('id',Auth()->user()->id)->pluck('name','id');
        return view('pendaftarans.create')->with(compact('ktas','tingkatans','users'));
    }

    /**
     * Store a newly created Pendaftaran in storage.
     *
     * @param CreatePendaftaranRequest $request
     *
     * @return Response
     */
    public function store(CreatePendaftaranRequest $request)
    {
        $input = $request->all();
        if (!File::isDirectory($this->buktiPembayaran)) {
            File::makeDirectory($this->buktiPembayaran);
        }elseif(!File::isDirectory($this->uploadberkas)){
            File::makeDirectory($this->uploadberkas);
        }

        $file = $request->file('bukti_pembayaran');
        $fileUpload = $request->file('upload_berkas');

        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $fileNameUpload = Carbon::now()->timestamp . '_' . uniqid() . '.' . $fileUpload->getClientOriginalExtension();
        
        $file->move($this->buktiPembayaran, $fileName);
        $fileUpload->move($this->uploadberkas, $fileNameUpload);
        
        $input['user_id']=Auth::user()->id;
        $input['bukti_pembayaran']=$fileName;
        $input['upload_berkas']=$fileNameUpload;
        $pendaftaran = $this->pendaftaranRepository->create($input);
        Alert::success('Pendaftaran Berhasil Disimpan.');

        return redirect(route('pendaftarans.index'));
    }

    /**
     * Display the specified Pendaftaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pendaftaran = $this->pendaftaranRepository->find($id);

        if (empty($pendaftaran)) {
            Alert::error('Pendaftaran Tidak Ditemukan');

            return redirect(route('pendaftarans.index'));
        }

        return view('pendaftarans.show')->with('pendaftaran', $pendaftaran);
    }

    /**
     * Show the form for editing the specified Pendaftaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $ktas = \App\Models\Kta::pluck('name','id');
        $tingkatans = \App\Models\Tingkatan::pluck('tingkatan','id');
        $users = \App\Models\User::pluck('name','id');
        $pendaftaran = $this->pendaftaranRepository->find($id);

        if (empty($pendaftaran)) {
            Alert::error('Pendaftaran Tidak Ditemukan');

            return redirect(route('pendaftarans.index'));
        }

        return view('pendaftarans.edit')->with('pendaftaran', $pendaftaran)->with(compact('ktas'))->with(compact('tingkatans'))->with(compact('users'));
    }

    /**
     * Update the specified Pendaftaran in storage.
     *
     * @param int $id
     * @param UpdatePendaftaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePendaftaranRequest $request)
    {
        $pendaftaran = $this->pendaftaranRepository->find($id);
        $input = $request->all();
        if ($request->file('bukti_pembayaran')){
            $file = $request->file('bukti_pembayaran');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($this->path, $fileName);
            $image_path = public_path('bukti_pembayaran/'.$pendaftaran->bukti_pembayaran);
            File::delete($image_path);
            $input['bukti_pembayaran']=$fileName;
        }elseif($request->file('upload_berkas')){
            $fileUpload = $request->file('upload_berkas');
            $fileNameUpload = Carbon::now()->timestamp . '_' . uniqid() . '.' . $fileUpload->getClientOriginalExtension();
            $file->move($this->path, $fileNameUpload);
            $image_path = public_path('bukti_berkas/'.$pendaftaran->upload_berkas);
            File::delete($image_path);
            $input['bukti_pembayaran']=$fileName;
        }else{
            $input['bukti_pembayaran']=$pendaftaran->upload_berkas;
            $input['upload_berkas']=$pendaftaran->upload_berkas;
        }
        $pendaftaran->kta_id = $request->kta_id;
        $pendaftaran->user_id = $request->user_id;
        $pendaftaran->no_tlp = $request->no_tlp;
        $pendaftaran->nama_gudep = $request->nama_gudep;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
        $pendaftaran->tingkatan_id = $request->tingkatan_id;
        if($request->bukti_pembayaran || $request->upload_berkas){
            $pendaftaran->bukti_pembayaran = $fileName;
            $pendaftaran->upload_berkas = $fileNameUpload;
        }
        $pendaftaran->save();
        // if (!File::isDirectory($this->path)) {
        //     File::makeDirectory($this->path);
        // }
        // $file = $request->file('bukti_pembayaran');
        // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // $file->move($this->path, $fileName);
        // $input = $request->all();
        // $input['user_id']=Auth::user()->id;
        // $input['bukti_pembayaran']=$fileName;
        // $pendaftaran = $this->pendaftaranRepository->update($input, $id);

        Alert::success('Pendaftaran Berhasil Diupdate.');

        return redirect(route('pendaftarans.index'));
    }

    /**
     * Remove the specified Pendaftaran from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pendaftaran = $this->pendaftaranRepository->find($id);

        if (empty($pendaftaran)) {
            Alert::error('Pendaftaran Tidak Ditemukan');

            return redirect(route('pendaftarans.index'));
        }

        $this->pendaftaranRepository->delete($id);

        Alert::success('Pendaftaran Berhasil Dihapus.');

        return redirect(route('pendaftarans.index'));
    }
}
