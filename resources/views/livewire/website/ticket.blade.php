<div>
<section id="faqs-pp" class="faqs-pp">
    <div class="container">
        <div class="row">
            <!-- Start Faq Sidebar -->
            <div class="col-xl-3 col-lg-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <ul class="list-unstyled">
                            <li class="@if($currentPage == 'create') active @endif"><a onclick="topbar.show()" wire:click="changePage('create')" style="cursor: pointer"><i class='bx bx-message-rounded-add'></i>{{ucwords(__('tickets_trans.create_ticket'))}}</a></li>
                            <li class="@if($currentPage == 'available') active @endif"><a onclick="topbar.show()" wire:click="changePage('available')" style="cursor: pointer"><i class="bx bx-list-ul"></i>{{ucwords(__('tickets_trans.available_ticket'))}}</a></li>
                            <li class="@if($currentPage == 'closed') active @endif"><a onclick="topbar.show()" wire:click="changePage('closed')" style="cursor: pointer"><i class="bx bx-lock"></i>{{ucwords(__('tickets_trans.closed_ticket'))}}</a></li>
                            <li class="@if($currentPage == 'purchase') active @endif"><a onclick="topbar.show()" wire:click="changePage('purchase')" style="cursor: pointer"><i class='bx bx-shopping-bag'></i>{{ucwords(__('tickets_trans.purchase_tickets'))}}</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <!-- End Faq Sidebar -->

            <div class="col-xl-9 col-lg-8">
                <div id="boxData">
                    @component('layouts.components.messages.success')
                    @endcomponent

                    @if ($currentPage == 'create')

                    <form wire:submit.prevent='submit' id="ticketsCreate" class="faq-control p-3" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <input wire:model='ticket.title' type="text" class="floating-label-field floating-label-field--s3" id="title" placeholder="{{ucwords(__('tickets_trans.title'))}}">
                                    <label for="title" class="floating-label">{{ucwords(__('tickets_trans.title'))}}</label>
                                </div>
                                @error('ticket.title')
                                    <span class="text-danger">* {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <select wire:model='ticket.ticket_type_id' class="floating-label-field floating-label-field--s3" id="type">
                                        <option value="">-- {{__('tickets_trans.type')}} --</option>
                                        @foreach($ticketTypes as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="type" class="floating-label">{{ucwords(__('tickets_trans.type'))}}</label>
                                </div>
                                @error('ticket.ticket_type_id')
                                    <span class="text-danger">* {{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <textarea wire:model='ticket.description' class="floating-label-field floating-label-field--s3" id="message" placeholder="{{ucwords(__('tickets_trans.message'))}}" rows="10"></textarea>
                                    <label for="message" class="floating-label">{{ucwords(__('tickets_trans.message'))}}</label>
                                </div>
                                @error('ticket.description')
                                    <span class="text-danger">* {{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div id="attachments">
                            @for ($i = 0; $i < $noFiles; $i++)
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <div class="floating-label-wrap">
                                            <input wire:model='files.{{$i}}' oninput="topbar.show();" type="file" class="floating-label-field floating-label-field--s3" id="attachInput{{$i}}" />
                                            <label for="attachInput{{$i}}" class="floating-label">
                                                {{ucwords(__('tickets_trans.attachment'))}}
                                            </label>
                                        </div>
                                    </div>
                                    @error('files')
                                        <span class="text-danger">* {{$message}}</span>
                                    @enderror
                                </div>
                            @endfor

                            <div class="form-group col-md-4">
                                <div class="floating-label-wrap">
                                    <div class="form-buttons">
                                        <input onclick="topbar.show()" wire:click='addBtn' type="button" value="{{ucwords(__('tickets_trans.add attachment'))}}" id="addAttachBtn">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <div class="form-buttons d-inline-block">
                                        <div id="profile-image-spinner" wire:loading class="spinner-border spinner-border-sm text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <input wire:loading.attr='disabled' onclick="topbar.show()" type="submit" value="{{ucwords(__('tickets_trans.create'))}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @elseif ($currentPage == 'available')

                    <div id="ticketsAvailable" class="faq-control p-3">
                        @if ($availableTickets->isEmpty())
                            <p class="text-center font-weight-bold" style="color: #4b3da7;">{{ucwords(__('tickets_trans.not available'))}}</p>
                        @else
                            @foreach ($availableTickets as $ticket)
                            <a href="{{route('tickets.show', $ticket->id)}}" class="job-post shadow-none">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5">
                                        <div class="job-title">
                                            <h5>{{$ticket->title}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="job-category">
                                            <span>{{$ticket->type->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="job-location">
                                            <i class="bx bx-time"></i>
                                            <span>{{$ticket->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        @endif
                    </div>

                    @elseif ($currentPage == 'closed')

                    <div id="ticketsClosed" class="faq-control p-3">
                        @if ($closedTickets->isEmpty())
                            <p class="text-center font-weight-bold" style="color: #4b3da7;">{{ucwords(__('tickets_trans.not available'))}}</p>
                        @else
                            @foreach ($closedTickets as $ticket)
                            <a href="{{route('tickets.show', $ticket->id)}}" class="job-post shadow-none">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5">
                                        <div class="job-title">
                                            <h5>{{$ticket->title}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="job-category">
                                            <span>{{$ticket->type->name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="job-location">
                                            <i class="bx bx-time"></i>
                                            <span>{{$ticket->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        @endif
                    </div>

                    @else

                    <div id="ticketsAvailable" class="faq-control p-3">
                        @if ($purchases->isEmpty())
                            <p class="text-center font-weight-bold" style="color: #4b3da7;">{{ucwords(__('tickets_trans.not available'))}}</p>
                        @else
                            @foreach ($purchases->sortByDesc('created_at') as $purchase)
                            <a href="{{route('purchases.show', $purchase->id)}}" class="job-post shadow-none">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5">
                                        <div class="job-title">
                                            <h5>{{$purchase->project->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4">
                                        <div class="job-category">
                                            <span>{{__('tickets_trans.purchases')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3">
                                        <div class="job-location">
                                            <i class="bx bx-time"></i>
                                            <span>{{$purchase->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        @endif
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

</div>
