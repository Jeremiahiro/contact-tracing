<h1 class="date f-xl">{{ date('d') }}</h1>
<h4 class="month f-30">{{ date('M, Y') }}</h4>
<h3 class="time f-46">{{ date('H:i A', strtotime('+1hour')) }}</h3>
