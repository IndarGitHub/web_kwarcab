<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Repositories\DownloadRepository;
use App\Http\Controllers\AppBaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Response;
use File;
use Carbon\Carbon;
use Auth;

class DownloadController extends AppBaseController
{
    /** @var  DownloadRepository */
    private $downloadRepository;

    public function __construct(DownloadRepository $downloadRepo)
    {
        $this->downloadRepository = $downloadRepo;
        $this->path = public_path('file_download');
    }

    /**
     * Display a listing of the Download.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $downloads = $this->downloadRepository->all();

        return view('downloads.index')
            ->with('downloads', $downloads);
    }

    /**
     * Show the form for creating a new Download.
     *
     * @return Response
     */
    public function create()
    {
        $users = \App\Models\User::pluck('name','id');        
        return view('downloads.create')->with(compact('users'));
    }

    /**
     * Store a newly created Download in storage.
     *
     * @param CreateDownloadRequest $request
     *
     * @return Response
     */
    public function store(CreateDownloadRequest $request)
    {
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
        $file = $request->file('file_download');
        $fileName = $file->getClientOriginalName();
        $file->move($this->path, $fileName);        
        $input = $request->all();
        $input['user_id']=Auth::user()->id;
        $input['file_download']=$fileName;
        $download = $this->downloadRepository->create($input);
        Alert::success('Download Berhasil Disimpan.');
        return redirect(route('downloads.index'));
    }

    /**
     * Display the specified Download.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $download = $this->downloadRepository->find($id);

        if (empty($download)) {
            Alert::error('Download Tidak Ditemukan');

            return redirect(route('downloads.index'));
        }

        return view('downloads.show')->with('download', $download);
    }

    /**
     * Show the form for editing the specified Download.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = \App\Models\User::pluck('name','id');
        $download = $this->downloadRepository->find($id);
        if (empty($download)) {
            Alert::error('Download Tidak Ditemukan');

            return redirect(route('downloads.index'));
        }

        return view('downloads.edit')->with('download', $download)->with(compact('users'));
    }

    /**
     * Update the specified Download in storage.
     *
     * @param int $id
     * @param UpdateDownloadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDownloadRequest $request)
    {
        $download = $this->downloadRepository->find($id);

        $input = $request->all();
        if($request->file('file_download')){
            $file = $request->file('file_download');
            $fileName = $file->getClientOriginalName();
            $file->move($this->path, $fileName);
            $file_path = public_path('file_download/'.$download->file_download);
            File::delete($file_path);
            $input['file_download'] = $file_path;
        }else{
            $input['file_download'] = $download->file_download;
        }

        $download->judul = $request->judul;
        $download->user_id = Auth::user()->id;
        $download->keterangan = $request->keterangan;
        if($request->file_download){
            $download->file_download = $fileName;
        }
        $download->status_file = $request->status_file;
        $download->save();

        Alert::success('Download Berhasil Diupdate.');
        return redirect(route('downloads.index'));
    }

    /**
     * Remove the specified Download from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $download = $this->downloadRepository->find($id);

        if (empty($download)) {
            Alert::error('Download Tidak Ditemukan');

            return redirect(route('downloads.index'));
        }

        $this->downloadRepository->delete($id);

        Alert::success('Download Berhasil Dihapus.');

        return redirect(route('downloads.index'));
    }
}
