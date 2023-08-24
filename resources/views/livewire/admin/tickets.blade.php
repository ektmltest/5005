<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">{{ __('dashboard_trans.TICKET SYSTEM') }}</li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Tickets Management') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card checkout-order-summary">
                        <div class="card-body">
                            <div class="p-3 bg-light mb-4">
                                <h5 class="font-size-16 mb-0">{{ __('dashboard_trans.tickets types') }}</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 table-nowrap">
                                    <tbody>
                                        <tr>
                                            <th>
                                                <a onclick="topbar.show()" class="{{$current_status != 'available' ? 'text-secondary' : ''}}" style="cursor: pointer;" class="waves-effect"
                                                    wire:click="changeStatus('available')">{{__('dashboard_trans.available tickets')}}</a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <a onclick="topbar.show()" class="{{$current_status != 'closed' ? 'text-secondary' : ''}}" style="cursor: pointer;" class="waves-effect"
                                                wire:click="changeStatus('closed')">{{__('dashboard_trans.closed tickets')}}</a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <a onclick="topbar.show()" class="{{$current_status != 'purchase' ? 'text-secondary' : ''}}" style="cursor: pointer;" class="waves-effect"
                                                wire:click="changeStatus('purchase')">{{__('tickets_trans.purchase_tickets')}}</a>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card checkout-order-summary">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__("dashboard_trans.$current_status tickets")}} <i class="bx bxs-briefcase-alt-2"></i></th>
                                        <th>{{__('dashboard_trans.TYPE')}}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($tickets as $ticket)
                                    @if ($current_status == 'purchase')
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>
                                            <a href="{{route('admin.purchases.show', $ticket->id)}}">
                                                {{ $ticket->user->full_name }}
                                                <br>
                                                <span class="text-secondary">{{$ticket->project->name}}</span>
                                                <br>
                                                <span class="text-secondary">{{\Str::limit($ticket->project->description, 20, '...')}}</span>
                                            </a>
                                        </td>
                                        <td><span class="bg-info text-light rounded p-1 badge">{{__('tickets_trans.purchases')}}</span></td>
                                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{$ticket->id}}</td>
                                        <td>
                                            <a href="{{route('admin.tickets.show', $ticket->id)}}">
                                                {{ $ticket->user->full_name }}
                                                <br>
                                                <span class="text-secondary">{{$ticket->title}}</span>
                                                <br>
                                                <span class="text-secondary">{{\Str::limit($ticket->description, 20, '...')}}</span>
                                            </a>
                                        </td>
                                        <td><span class="bg-info text-light rounded p-1 badge">{{ $ticket->type->name }}</span></td>
                                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>

                                <tfoot>
                                    <tr><td colspan="4">{{$tickets->links()}}</td></tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->

        </div>
    </div>
</div>
