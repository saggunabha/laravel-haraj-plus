<li>
    <div class="rev-det">
        <div class="rev-name">
            <div class="full-width-img rev-img">
                <img    src="{{$rate->user->image?asset('storage/'.$rate->user->image):asset("admin/images/main/avatar.png")}}"    class="converted-img" alt="img" />
            </div>
            {{$rate->user->name}}
            <span class="rev-date">{{$rate->created_at->format("d/m/Y")}}</span>
            <div class="prod-stars">
                <div class="static-stars">
                    <input class="star" type="radio"  name="starclothes" @if($rate->degree==5) checked @endif disabled  >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes"  @if($rate->degree==4) checked  @endif disabled >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes"  @if($rate->degree==3) checked @endif disabled >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes" @if($rate->degree==2) checked @endif disabled >
                    <label class="star"></label>
                    <input class="star" type="radio" name="starclothes" @if($rate->degree==1) checked @endif disabled >
                    <label class="star"></label>

                </div>

            </div>
        </div>


        <p>
            {{$rate->comment}}
        </p>
    </div>

</li>
