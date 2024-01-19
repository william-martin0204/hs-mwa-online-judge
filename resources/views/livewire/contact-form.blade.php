<div>
    <form wire:submit="submitContact" class="w-full bg-blue-300 p-5">

        <x-success-message />

        <h1 class="text-2xl font-extrabold text-white">Is there something you want to tell us?</h1>
        <div class="flex">
            <div class="flex-1">
                <div class="flex my-3">
                    <x-input-text-field isLivewire="true" name="email" placeholder="Your email" />
                    <div class="w-1/12"></div>
                    <x-input-text-field isLivewire="true" name="name" placeholder="Your name" />
                </div>
                <x-input-textarea-field isLivewire="true" name="message" placeholder="Your message" rows="3" />
            </div>
            <div class="flex justify-content-center items-center mx-5">
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded">Send</button>
            </div>
        </div>
    </form>
</div>

