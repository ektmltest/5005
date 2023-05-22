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
                    <form id="ticketsCreate" class="faq-control p-3">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <input type="text" class="floating-label-field floating-label-field--s3" id="subject" name="subject" placeholder="title">
                                    <label for="subject" class="floating-label">title</label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <div class="floating-label-wrap">
                                    <select class="floating-label-field floating-label-field--s3" id="subject" name="subject">
                                        <option value="">test</option>
                                        <option value="">test</option>
                                        <option value="">test</option>
                                    </select>
                                    <label for="subject" class="floating-label">title</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <textarea class="floating-label-field floating-label-field--s3" id="subject" name="subject" placeholder="title" rows="10"></textarea>
                                    <label for="subject" class="floating-label">title</label>
                                </div>
                            </div>
                        </div>

                        <div id="attachments">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <div class="floating-label-wrap">
                                        <input type="file" class="floating-label-field floating-label-field--s3" id="attachInput" name="attachments[]" />
                                        <label for="attachInput" class="floating-label">attachments</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-group col">
                                <div class="floating-label-wrap">
                                    <div class="form-buttons d-inline-block">
                                        <input type="submit" value="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="ticketsAvailable" class="d-none faq-control p-3">
                        <a href="{{route('tickets.show')}}" class="job-post shadow-none">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5">
                                    <div class="job-title">
                                        <h5>Email Sender - TEST</h5>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4">
                                    <div class="job-category">
                                        <span>إستفسار</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="job-location">
                                        <i class="bx bx-time"></i>
                                        <span>2023-05-16 09:27:16</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        {{-- <p class="text-center font-weight-bold" style="color: #4b3da7;">No Available tickets</p> --}}
                    </div>

                    <div id="ticketsClosed" class="d-none faq-control p-3">
                        <a href="{{route('tickets.show')}}" class="job-post shadow-none">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5">
                                    <div class="job-title">
                                        <h5>Email Sender - TEST</h5>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4">
                                    <div class="job-category">
                                        <span>إستفسار</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="job-location">
                                        <i class="bx bx-time"></i>
                                        <span>2023-05-16 09:27:16</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        {{-- <p class="text-center font-weight-bold" style="color: #4b3da7;">No Available closed tickets</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Faqs -->

<script src="{{asset('assets/js/tickets.js')}}"></script>
