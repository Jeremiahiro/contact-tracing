@extends('layouts.app')

@section('title')
FAQ
@endsection

@section('custom-style')
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";

</script>
@endsection

@section('content')

<div class="py-2">
    <div class="m-3 f-12">
        FREQUENTLY ASKED QUESTIONS.
    </div>
</div>

<div id="faq-accordion" class="mb-5">

    {{-- why use the app --}}
    <div class="card">
        <div class="card-header" id="faqItemOne">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqOne"
                    aria-expanded="true" aria-controls="faqOne">
                    Why Should I use the App?
                </button>
            </h5>
        </div>

        <div id="faqOne" class="collapse show" aria-labelledby="faqItemOne" data-parent="#faq-accordion">
            <div class="card-body light">
                The Save One Plus application is a means to help curtail the spread of the Coronavirus by logging your
                movements, you will be protecting yourself first, your family and loved ones and the society at large.
                We
                require your consent to share your data and registration on the platform is voluntary.
            </div>
        </div>
    </div>

    {{-- how it works --}}
    <div class="card">
        <div class="card-header" id="faqItemTwo">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqTwo"
                    aria-expanded="true" aria-controls="faqTwo">
                    How does the platform work?
                </button>
            </h5>
        </div>

        <div id="faqTwo" class="collapse" aria-labelledby="faqItemTwo" data-parent="#faq-accordion">
            <div class="card-body light">
                Individuals sign up on the platform, verify their email address and then proceed to log in details of
                places and people they have come in contact with and that are within proximity under activity. Then,
                you are notified about new cases within your vicinity or network, the app also helps to track the
                movement of infected persons to ensure that they are observing the appropriate guidelines and self-
                isolation.
                <br>
                The App isn’t intended to protect just the users but the users contact in the advent of an infection
                which we hope to curtail.
            </div>
        </div>
    </div>

    {{-- difference from other app --}}
    <div class="card">
        <div class="card-header" id="faqItemThree">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqThree"
                    aria-expanded="true" aria-controls="faqThree">
                    How is the APP different from other existing contact tracing Applications?
                </button>
            </h5>
        </div>

        <div id="faqThree" class="collapse" aria-labelledby="faqItemThree" data-parent="#faq-accordion">
            <div class="card-body light">
                Our primary objective is to support the government and health officials with contact tracing and
                contagion containment; however, we do offer other services such as Support to financially handicapped
                individuals, events management database to track attendees and the PCR testing to determine your
                health status before you proceed to consult a health official.
            </div>
        </div>
    </div>

    {{-- How do I know if the app is active --}}
    <div class="card">
        <div class="card-header" id="faqItemFour">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqFour"
                    aria-expanded="true" aria-controls="faqFour">
                    How Do I know if the APP is active?
                </button>
            </h5>
        </div>

        <div id="faqFour" class="collapse" aria-labelledby="faqItemFour" data-parent="#faq-accordion">
            <div class="card-body light">
                For optimal benefit and use, we advise that you allow the application to run in the background
                especially when you intend to come in contact with people outside your home or safe space.
            </div>
        </div>
    </div>

    {{-- What information is being collected --}}
    <div class="card">
        <div class="card-header" id="faqItemFive">
            <h5 class="mb-0">
                <button class="btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqFive"
                    aria-expanded="true" aria-controls="faqFive">
                    What information is being collected?
                </button>
            </h5>
        </div>

        <div id="faqFive" class="collapse" aria-labelledby="faqItemFive" data-parent="#faq-accordion">
            <div class="card-body light">
                The data collected are encrypted and confidential, no one can gain access to or share information
                without your consent.
                see the <a href="{{ route('privacy') }}" class="text-primary"> Privacy Policy</a> for more information
                on data usage
            </div>
        </div>
    </div>

    {{-- Policy on minor --}}
    <div class="card">
        <div class="card-header" id="faqItemSix">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqSix"
                    aria-expanded="true" aria-controls="faqSix">
                    What is your policy on minor?
                </button>
            </h5>
        </div>

        <div id="faqSix" class="collapse" aria-labelledby="faqItemSix" data-parent="#faq-accordion">
            <div class="card-body light">
                We require parents or guardian’s consent for children below 16 years of age. In the event that a or some
                minors are registered on the platform without their parents/guardian’s consent, such an account will be
                deleted once we confirm or receive any report and have verified the account to be true.
            </div>
        </div>
    </div>

    {{-- Notification --}}
    <div class="card">
        <div class="card-header" id="faqItemSeven">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqSeven"
                    aria-expanded="true" aria-controls="faqSeven">
                    What happens when an infected user tests positive?
                </button>
            </h5>
        </div>

        <div id="faqSeven" class="collapse" aria-labelledby="faqItemSeven" data-parent="#faq-accordion">
            <div class="card-body light">
                We understand that the society may stigmatize you and your family in the advent of you being infected
                however, we encourage you to alert those whom you have been in close proximity with to isolate and
                adhere to the safety directives that will be given to you by the health authorities. It’s important that
                you
                publish your data so as to protect others so we can break the chain of transmission early.
            </div>
        </div>
    </div>

    {{-- Support --}}
    <div class="card">
        <div class="card-header" id="faqItemEight">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqEight"
                    aria-expanded="true" aria-controls="faqEight">
                    How does the support feature work?
                </button>
            </h5>
        </div>

        <div id="faqEight" class="collapse" aria-labelledby="faqItemEight" data-parent="#faq-accordion">
            <div class="card-body light">
                As an NGO that is intent on improved human welfare and existence, we raise money for causes through
                grants or donations from both foreign and local corporate bodies and individuals, also individuals may
                also get support in form of medicals, food and cash to meet their basic needs when they indicate on the
                platform as well also, you can be paired with a benefactor who wishes to address your need.
            </div>
        </div>
    </div>

    {{-- Support Entitlement --}}
    <div class="card">
        <div class="card-header" id="faqItemNine">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqNine"
                    aria-expanded="true" aria-controls="faqNine">
                    What category of people are entiled to support?
                </button>
            </h5>
        </div>

        <div id="faqNine" class="collapse" aria-labelledby="faqItemNine" data-parent="#faq-accordion">
            <div class="card-body light">
                Individuals who are out of job, students, low income earners and poor families struggling to make ends
                meet, we understand how the current pandemic has affected us and so we intend to help offset some of
                the hardships by issuing palliatives depending each individual’s need; medical, food, cash transfers.
                Support will be tailored to suit the needs of the individual.
            </div>
        </div>
    </div>

    {{-- Providing Support --}}
    <div class="card">
        <div class="card-header" id="faqItemTen">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqTen"
                    aria-expanded="true" aria-controls="faqTen">
                    How can I make donation or provide support?
                </button>
            </h5>
        </div>

        <div id="faqTen" class="collapse" aria-labelledby="faqItemTTen" data-parent="#faq-accordion">
            <div class="card-body light">
                Support can be made in two ways; we will provide you with the details of people needing basic support
                so you can assist them directly or alternatively, you can make a donation through our third-party
                payment partner PayStack for a cause or project that’s ongoing.
            </div>
        </div>
    </div>

    {{-- Feedback on donations --}}
    <div class="card">
        <div class="card-header" id="faqItemEleven">
            <h5 class="mb-0">
                <button class="text-left btn m-0 p-0 text-primary f-14" data-toggle="collapse" data-target="#faqEleven"
                    aria-expanded="true" aria-controls="faqEleven">
                    Financial Report and Feedback on Donations
                </button>
            </h5>
        </div>

        <div id="faqEleven" class="collapse" aria-labelledby="faqItemEleven" data-parent="#faq-accordion">
            <div class="card-body light">
                We will publish quarterly financial statements, accounting for aggregate funds received and disbursed
                within the period and this will be made available on our website.
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
