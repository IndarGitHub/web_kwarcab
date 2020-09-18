<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecommentRequest;
use App\Http\Requests\UpdatecommentRequest;
use App\Repositories\commentRepository;
use App\Http\Controllers\AppBaseController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class commentController extends AppBaseController
{
    /** @var  commentRepository */
    private $commentRepository;

    public function __construct(commentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Display a listing of the comment.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $comments = $this->commentRepository->all();

        return view('comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param CreatecommentRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreatecommentRequest $request)
    {
        $input = $request->all();

        $comment = $this->commentRepository->create($input);

        Alert::success('Comment saved successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Display the specified comment.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Alert::error('Comment not found');

            return redirect(route('comments.index'));
        }

        return view('comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Alert::error('Comment not found');

            return redirect(route('comments.index'));
        }

        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified comment in storage.
     *
     * @param int $id
     * @param UpdatecommentRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatecommentRequest $request)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Alert::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $comment = $this->commentRepository->update($request->all(), $id);

        Alert::success('Comment updated successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $comment = $this->commentRepository->find($id);

        if (empty($comment)) {
            Alert::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $this->commentRepository->delete($id);

        Alert::success('Comment deleted successfully.');

        return redirect(route('comments.index'));
    }
}
