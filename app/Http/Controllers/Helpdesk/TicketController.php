<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Ticket::class);

        return view('helpdesk.tickets.index');
    }

    public function create()
    {
        $this->authorize('create', Ticket::class);

        return view('helpdesk.tickets.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Ticket::class);

        return redirect()->route('helpdesk.tickets.index');
    }

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        return view('helpdesk.tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        return view('helpdesk.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }

    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();

        return redirect()->route('helpdesk.tickets.index');
    }

    public function assign(Ticket $ticket)
    {
        $this->authorize('assign', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }

    public function close(Ticket $ticket)
    {
        $this->authorize('close', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }

    public function reopen(Ticket $ticket)
    {
        $this->authorize('reopen', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }
}
