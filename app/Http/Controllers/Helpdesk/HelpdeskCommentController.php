<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\HelpdeskComment;
use Illuminate\Http\Request;

class HelpdeskCommentController extends Controller
{
    public function index(Ticket $ticket)
    {
        $this->authorize('viewAny', HelpdeskComment::class);
        return view('helpdesk.comments.index', compact('ticket'));
    }

    public function store(Request $request, Ticket $ticket)
    {
        $this->authorize('create', HelpdeskComment::class);
        return redirect()->route('helpdesk.tickets.show', $ticket);
    }

    public function destroy(Ticket $ticket, HelpdeskComment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('helpdesk.tickets.show', $ticket);
    }
}
