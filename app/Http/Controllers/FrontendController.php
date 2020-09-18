<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatecommentRequest;
use App\Repositories\BeritaRepository;
use App\Repositories\kegiatanRepository;
use App\Repositories\DownloadRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\commentRepository;
use DB;
use \Carbon\Carbon;
use PDF;
use Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $beritaRepository;
    private $kegiatanRepository;
    private $commentRepository;
    private $downloadRepository;

    public function __construct(
        BeritaRepository $beritaRepo, 
        kegiatanRepository $kegiatanRepo, 
        commentRepository $commentRepo,
        DownloadRepository $downloadRepo
        )
    {
        $this->beritaRepository = $beritaRepo;
        $this->kegiatanRepository = $kegiatanRepo;
        $this->commentRepository = $commentRepo;
        $this->downloadRepository = $downloadRepo;
    }
    
    public function index(Request $request)
    {
        $cari = $request->cari;

        $beritas = \App\Models\Berita::where('judul','like',"%".$cari."%")->paginate(10);
        $beritas->setCollection($beritas->sortByDesc('created_at'));

        $beritasTerkini = \App\Models\Berita::get();

        $kegiatans = \App\Models\kegiatan::where('judul_kegiatan','like',"%".$cari."%")->paginate(10);
        $kegiatans->setCollection($kegiatans->sortByDesc('created_at'));
        // $beritas = DB::table('beritas')->paginate(10)->sortByDesc('id');
        return view('dashboard.index')->with(compact('beritas','beritasTerkini','kegiatans'));
    }

    public function unduh(Request $request)
    {
        $cari = $request->cari;
        $unduhs = \App\Models\Download::where('judul','like',"%".$cari."%")->get();
        return view('dashboard.unduh')->with(compact('unduhs'));
    }
    public function unduh_file($id)
    {
        // $unduhs = \App\Models\Download::get();
        $unduhs = $this->downloadRepository->find($id);
        $filename = public_path('file_download'.'/'.$unduhs->file_download);
        return response()->file($filename);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_berita($id, Request $request)
    {
        $berita = $this->beritaRepository->find($id);
        // $comment = $this->commentRepository->find($id);

        // $comment->komentar = $request->komentar;
        // $comment->save();

        $kegiatans = \App\Models\kegiatan::paginate(10);
        $kegiatans->setCollection($kegiatans->sortByDesc('created_at'));

        $beritasTerkini = \App\Models\Berita::paginate(10);
        $beritasTerkini->setCollection($beritasTerkini->sortByDesc('created_at'));

        $comment = \App\Models\Comment::where('berita_id',$id)->get();
        
        return view('dashboard.show_berita')
        ->with('berita', $berita)
        ->with('comment', $comment)
        ->with(compact('kegiatans','beritasTerkini'))
        ;
    }

    public function comment($id, Request $request){
        DB::beginTransaction();
        try {

            $comment = new \App\Models\Comment();
            $berita = $this->beritaRepository->find($id);

            $comment['user_id'] = Auth::user()->id;
            $comment['berita_id'] = $berita->id;
            $comment->komentar = $request->komentar;
            $comment->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect('berita/'.$id);
    }

    public function show_kegiatan($id)
    {
        $kegiatan = $this->kegiatanRepository->find($id);

        $kegiatans = \App\Models\kegiatan::paginate(10);
        $kegiatans->setCollection($kegiatans->sortByDesc('created_at'));

        $beritasTerkini = \App\Models\Berita::paginate(10);
        $beritasTerkini->setCollection($beritasTerkini->sortByDesc('created_at'));

        $comment = \App\Models\CommentKegiatan::where('kegiatan_id',$id)->get();

        return view('dashboard.show_kegiatan')->with('kegiatan', $kegiatan)
        ->with(compact('kegiatans','beritasTerkini','comment'))
        ;
    }

    public function comment_kegiatan($id, Request $request){
        DB::beginTransaction();
        try {

            $comment_kegiatan = new \App\Models\CommentKegiatan();
            $kegiatan = $this->kegiatanRepository->find($id);

            $comment_kegiatan['user_id'] = Auth::user()->id;
            $comment_kegiatan['kegiatan_id'] = $kegiatan->id;
            $comment_kegiatan->komentar = $request->komentar;
            $comment_kegiatan->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect('kegiatan/'.$id);
    }

    public function dkc()
    {
        return view('dashboard.dkc');
    }
    public function visimisi()
    {
        return view('dashboard.visimisi');
    }
    public function strukturorganisasi()
    {
        return view('dashboard.strukturorganisasi');
    }
    public function profile()
    {
        return view('dashboard.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = $this->commentRepository->find($id);
        $comment = $this->commentRepository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
