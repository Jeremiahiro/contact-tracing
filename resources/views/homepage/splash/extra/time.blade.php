<h1 class="date">{{ date('d') }}</h1>
<h4 class="month">{{ date('M, Y') }}</h4>
<h3 class="time">{{ date('H:i A', strtotime('+1hour')) }}</h3>
