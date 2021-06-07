<div {{$attributes->merge(['class' => "mt-5 mx-auto bg-gray-100 rounded-md p-5 py-10 flex flex-col justify-center items-center" ])}}>
    <div>
        <img src="/img/nodata.png" alt="" class="w-56 h-auto rounded-md ">
    </div>
    <h4 class="mt-3 text-xl text-center text-gray-500 text-uppercase">{{$message ?? '-- Nothing --' }}</h4>
</div>
