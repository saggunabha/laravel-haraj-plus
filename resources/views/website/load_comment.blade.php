<li>
    <div class="rev-det">
        <div class="rev-name">
            <div class="full-width-img rev-img">
                <img  @if($rate->user->image)  src="{{asset('storage/'.$rate->user->image)}}"  @else src="{{asset("admin/images/main/avatar.png")}}"  @endif }} class="converted-img" alt="img" />
            </div>
            {{$rate->user->name}}
            <span class="rev-date">{{$rate->created_at->format("d/m/Y")}}</span>
            <div class="prod-stars">
                <div class="static-stars">
                    <input class="star" type="radio"  name="starclothes.{{$rate->id}}" @if($rate->degree==5) checked @endif disabled  >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes.{{$rate->id}}"  @if($rate->degree==4) checked  @endif disabled >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes.{{$rate->id}}"  @if($rate->degree==3) checked @endif disabled >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes.{{$rate->id}}" @if($rate->degree==2) checked @endif disabled >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes.{{$rate->id}}" @if($rate->degree==1) checked @endif disabled >
                    <label class="star"></label>

                </div>

            </div>
        </div>


        <p>
            {{$rate->comment}}
        </p>
    </div>

</li>
