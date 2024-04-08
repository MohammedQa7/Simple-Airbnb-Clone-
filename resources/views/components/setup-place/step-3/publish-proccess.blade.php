<div>
    <section class="pb-5 mb-5 mt-5">
        <div class="container d-flex justify-content-center align-items-center flex-column">
                <div class="review-field-section w-75">
                    <h1>Review your listing</h1>
                    <p class="mt-4">Here's what we'll show to guests. Make sure everything looks good.</p>
                </div>
                <div class="place-overview-section w-75  mt-5">
                    <div class="row">
                        {{$slot}}

                        <div class="col-lg-6 d-flex justify-content-center flex-column">
                            <div class="what-next-section " >
                                <h1>What's next?</h1>
                                <div class="what-next-list">
                                    <div class="list-holder d-flex  mt-4">
                                        <img  src="{{asset('Assets/images/Icons/confirm.svg')}}" alt="">
                                        <div class="list-content ms-3">
                                            <h1>Confirm a few details and publish</h1>
                                            <p>We’ll let you know if you need to verify your identity or register with the local government.</p>
                                        </div>
                                    </div>

                                    <div class="list-holder d-flex mt-4">
                                        <img  src="{{asset('Assets/images/Icons/adjust-setting.svg')}}" alt="">
                                        <div class="list-content ms-3">
                                            <h1>Adjust your settings</h1>
                                            <p>Set house rules, select a cancellation policy, choose how guests book, and more.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</div>