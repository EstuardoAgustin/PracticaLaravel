<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="container w-25 border p-4 mt-4 ">
        @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>

        @endif
        @error('title')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <livewire:ToDo.task/>

    </div>
</div>
