<?php

namespace App\Http\Controllers\Helpdesk;

use App\Http\Controllers\Controller;
use App\Models\HelpdeskTicket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', HelpdeskTicket::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('helpdesk.tickets.index');
    }

    public function create()
    {
        $this->authorize('create', HelpdeskTicket::class);

        /** @phpstan-return \Illuminate\View\View */
        return view('helpdesk.tickets.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', HelpdeskTicket::class);

        return redirect()->route('helpdesk.tickets.index');
    }

    public function show(HelpdeskTicket $ticket)
    {
        $this->authorize('view', $ticket);

        /** @phpstan-return \Illuminate\View\View */
        return view('helpdesk.tickets.show', compact('ticket'));
    }

    public function edit(HelpdeskTicket $ticket)
    {
        $this->authorize('update', $ticket);

        /** @phpstan-return \Illuminate\View\View */
        return view('helpdesk.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, HelpdeskTicket $ticket)
    {
        $this->authorize('update', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }

    public function destroy(HelpdeskTicket $ticket)
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();

        return redirect()->route('helpdesk.tickets.index');
    }

    public function assign(HelpdeskTicket $ticket)
    {
        $this->authorize('assign', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }

    public function close(HelpdeskTicket $ticket)
    {
        $this->authorize('close', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }

    public function reopen(HelpdeskTicket $ticket)
    {
        $this->authorize('reopen', $ticket);

        return redirect()->route('helpdesk.tickets.show', $ticket);
    }
}
