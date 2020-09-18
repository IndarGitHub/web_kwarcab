<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentKegiatanRequest;
use App\Http\Requests\UpdateCommentKegiatanRequest;
use App\Repositories\CommentKegiatanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class CommentKegiatanController extends AppBaseController
{
    /** @var  CommentKegiatanRepository */
    private $commentKegiatanRepository;

    public function __construct(CommentKegiatanRepository $commentKegiatanRepo)
    {
        $this->commentKegiatanRepository = $commentKegiatanRepo;
    }

    /**
     * Display a listing of the CommentKegiatan.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $commentKegiatans = $this->commentKegiatanRepository->all();

        return view('comment_kegiatans.index')
            ->with('commentKegiatans', $commentKegiatans);
    }

    /**
     * Show the form for creating a new CommentKegiatan.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('comment_kegiatans.create');
    }

    /**
     * Store a newly created CommentKegiatan in storage.
     *
     * @param CreateCommentKegiatanRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateCommentKegiatanRequest $request)
    {
        $input = $request->all();

        $commentKegiatan = $this->commentKegiatanRepository->create($input);

        Flash::success('Comment Kegiatan saved successfully.');

        return redirect(route('commentKegiatans.index'));
    }

    /**
     * Display the specified CommentKegiatan.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $commentKegiatan = $this->commentKegiatanRepository->find($id);

        if (empty($commentKegiatan)) {
            Flash::error('Comment Kegiatan not found');

            return redirect(route('commentKegiatans.index'));
        }

        return view('comment_kegiatans.show')->with('commentKegiatan', $commentKegiatan);
    }

    /**
     * Show the form for editing the specified CommentKegiatan.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $commentKegiatan = $this->commentKegiatanRepository->find($id);

        if (empty($commentKegiatan)) {
            Flash::error('Comment Kegiatan not found');

            return redirect(route('commentKegiatans.index'));
        }

        return view('comment_kegiatans.edit')->with('commentKegiatan', $commentKegiatan);
    }

    /**
     * Update the specified CommentKegiatan in storage.
     *
     * @param int $id
     * @param UpdateCommentKegiatanRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateCommentKegiatanRequest $request)
    {
        $commentKegiatan = $this->commentKegiatanRepository->find($id);

        if (empty($commentKegiatan)) {
            Flash::error('Comment Kegiatan not found');

            return redirect(route('commentKegiatans.index'));
        }

        $commentKegiatan = $this->commentKegiatanRepository->update($request->all(), $id);

        Flash::success('Comment Kegiatan updated successfully.');

        return redirect(route('commentKegiatans.index'));
    }

    /**
     * Remove the specified CommentKegiatan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $commentKegiatan = $this->commentKegiatanRepository->find($id);

        if (empty($commentKegiatan)) {
            Flash::error('Comment Kegiatan not found');

            return redirect(route('commentKegiatans.index'));
        }

        $this->commentKegiatanRepository->delete($id);

        Flash::success('Comment Kegiatan deleted successfully.');

        return redirect(route('commentKegiatans.index'));
    }
}
