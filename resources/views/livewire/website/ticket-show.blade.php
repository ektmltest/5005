<section id="blog-pp" class="blog-pp single-pp">
    <div class="container">
        <div class="row">
            <!-- Start Faq Sidebar -->
            <div class="col-xl-3 col-lg-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <ul class="list-unstyled">
                            <li class="active"><a href="{{ route('tickets') }}" id="ticketsCreateLink" style="cursor: pointer"><i class='bx bx-message-rounded-add'></i>{{ucwords(__('tickets_trans.create_ticket'))}}</a></li>
                            <li><a href="{{ route('showAvailableTickets') }}" id="ticketsAvailableLink" style="cursor: pointer"><i class="bx bx-list-ul"></i>{{ucwords(__('tickets_trans.available_ticket'))}}</a></li>
                            <li><a href="{{ route('showClosedTickets') }}" id="ticketsClosedLink" style="cursor: pointer"><i class="bx bx-lock"></i>{{ucwords(__('tickets_trans.closed_ticket'))}}</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <!-- End Faq Sidebar -->

            <div class="col-xl-9 col-lg-8">
                <!-- Start Post -->
                <div class="post-item comment-box">
                    <div class="post-txt">
                        <a class="post-title wordsBreaker">Email Sender - TEST</a>
                        <ul class="list-unstyled post-details wordsBreaker">
                            <div class="comment-head">
                                <div class="member-info">
                                    <div class="member-img">
                                        <img class="img-fluid" src="https://www.ektml.com/avatar/user/719" alt="Avatar">
                                    </div>
                                    <div class="member-name">
                                        <h6>
                                            <a>kareem shaaban</a>
                                            <span><i class="bx bxs-circle" style="font-size: 6px"></i> مدير العمليات
                                                التشغيلية </span>
                                        </h6>
                                        <span class="date">16 مايو, 2023 - 12:27 مساءً</span>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <p class="mt-3 wordsBreaker">
                            testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest
                        </p>
                        <div id="attachments" class="mt-2">
                            <hr><small class="text-muted"> المرفقات:</small><br> <span><i
                                    class="bx bxs-chevron-left text-muted"></i><small><a
                                        href="https://www.ektml.com/tickets/attachment/81/0"><i class="bx bx-file"></i>
                                        ML_1.pdf.pdf </a></small><br>
                            </span>
                        </div>

                        <div class="footer-post">
                            <div class="tags">
                                <a>إستفسار</a>
                            </div>
                            <div class="action-post">
                                <h6 style="color:red;">التذكرة مغلقة</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Comments -->
                    <div class="post-comments mt-4">
                        <ul class="list-unstyled">
                            <!-- Start Comment -->
                            <li class="comment-inner">
                                <ul class="replies" id="repliesSec">
                                </ul>

                            </li>
                        </ul>
                    </div>


                    <!-- Start Leave Comment -->
                    <!-- End Leave Comment -->
                </div>
                <!-- End Post -->
            </div>
        </div>
    </div>

</section>
