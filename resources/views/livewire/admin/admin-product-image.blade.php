<div class="container mx-auto flex flex-wrap pt-4 pb-12">
  @foreach($images as $image)
        <div
            class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col border-black border-opacity-25 items-center">
            <div
                style="background-image: url({{$s3Photo .$image->image}})"
                class="bg-gray-300 h-64 w-full rounded-lg shadow-md bg-cover bg-center"
                loading="lazy"></div>
            <div
                class="w-56 md:w-64 bg-white -mt-10 shadow-lg rounded-lg overflow-hidden justify-items-center hover:grow hover:shadow-lg border-black border-opacity-25">
                <div class="flex justify-center  py-2 px-3 bg-gray-400">
                    <button wire:click="destroyPhoto({{$image->id}})"
                       class=" bg-red-800 text-xs text-white px-2 py-1 font-semibold rounded uppercase hover:bg-red-700">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

