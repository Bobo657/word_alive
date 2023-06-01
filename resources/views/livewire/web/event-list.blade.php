<section>
    <div class="container">
        <div class="row">
            @foreach($events as $event)
            <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="schedule-box maxwidth500 bg-light mb-30">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="{{ $event->photo_url }}">
               
                </div>
                <div class="schedule-details clearfix p-15 pt-10">
                <h5 class="font-16 title">{{ $event->title }} </h5>
                <ul class="list-inline font-11 mb-10">
                    <li><i class="fa fa-calendar mr-5"></i> {{ $event->start_date }} 
                    {{ $event->end_date ? ' - '.$event->end_date : ''}}  </li><br>
                    <li><i class="fa fa-clock-o mr-5"></i> {{ $event->time }} </li><br>
                    <li><i class="fa fa-map-marker mr-5"></i> {{ $event->location }} </li>
                </ul>
                <p>{{ $event->description }}</p>
                </div>
            </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
