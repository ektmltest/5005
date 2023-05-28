<!-- Start Faqs -->
<section id="faqs-pp" class="faqs-pp">
    <div class="container">
        <div class="row">
            <!-- Start Faq Sidebar -->
            <div class="col-xl-3 col-lg-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <ul class="list-unstyled">
                            <li class="active"><a id="ticketsCreateLink" style="cursor: pointer"><i class='bx bx-message-rounded-add'></i>{{ucwords(__('tickets_trans.create_ticket'))}}</a></li>
                            <li><a id="ticketsAvailableLink" style="cursor: pointer"><i class="bx bx-list-ul"></i>{{ucwords(__('tickets_trans.available_ticket'))}}</a></li>
                            <li><a id="ticketsClosedLink" style="cursor: pointer"><i class="bx bx-lock"></i>{{ucwords(__('tickets_trans.closed_ticket'))}}</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <!-- End Faq Sidebar -->

            <div class="col-xl-9 col-lg-8">
                <div id="boxData">
                    <form wire:submit.prevent='submit' id="ticketsCreate" class="faq-control p-3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <input wire:model='title' type="text" class="floating-label-field floating-label-field--s3" id="title" placeholder="{{ucwords(__('tickets_trans.title'))}}">
                                    <label for="title" class="floating-label">{{ucwords(__('tickets_trans.title'))}}</label>
                                </div>
                                @error('title')
                                    <span class="text-danger">* {{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <select wire:model='type' class="floating-label-field floating-label-field--s3" id="subject">
                                        @foreach ($ticketTypes as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="subject" class="floating-label">{{ucwords(__('tickets_trans.type'))}}</label>
                                </div>
                                @error('type')
                                    <span class="text-danger">* {{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <textarea wire:model='message' class="floating-label-field floating-label-field--s3" id="message" placeholder="{{ucwords(__('tickets_trans.message'))}}" rows="10"></textarea>
                                    <label for="message" class="floating-label">{{ucwords(__('tickets_trans.message'))}}</label>
                                </div>
                                @error('message')
                                    <span class="text-danger">* {{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div id="attachments">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <div class="floating-label-wrap">
                                        <input wire:model='files[]' type="file" class="floating-label-field floating-label-field--s3" id="attachInput" />
                                        <label for="attachInput" class="floating-label">{{ucwords(__('tickets_trans.attachment'))}}</label>
                                    </div>
                                </div>
                                @error('files')
                                    <span class="text-danger">* {{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <div class="form-buttons d-inline-block">
                                        <input type="submit" value="{{ucwords(__('tickets_trans.create'))}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="ticketsAvailable" class="d-none faq-control p-3">
                        @if ($availableTickets->isEmpty())
                            <p class="text-center font-weight-bold" style="color: #4b3da7;">{{ucwords(__('tickets_trans.not available'))}}</p>
                        @else
                            @foreach ($availableTickets as $ticket)
                            <a href="{{route('tickets.show')}}" class="job-post shadow-none">
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

                    <div id="ticketsClosed" class="d-none faq-control p-3">
                        @if ($closedTickets->isEmpty())
                            <p class="text-center font-weight-bold" style="color: #4b3da7;">{{ucwords(__('tickets_trans.not available'))}}</p>
                        @else
                            @foreach ($closedTickets as $ticket)
                            <a href="{{route('tickets.show')}}" class="job-post shadow-none">
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
                </div>
            </div>
        </div>
    </div>

    {{-- * scripting js for animation --}}
    <script>
        var attachmentTitle = "{{ucwords(__('tickets_trans.attachment'))}}";
        var attachmentAdd = "{{ucwords(__('tickets_trans.add attachment'))}}"
    </script>
    <script src="{{asset('assets/js/tickets.js')}}"></script>
</section>
<!-- End Faqs -->

