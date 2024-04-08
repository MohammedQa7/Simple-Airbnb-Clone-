@props(['name'])
<div 
x-data = "{visiable : false , name : '{{$name}}'}"
x-show = "visiable"
x-on:open-modal.window = "visiable = ($event.detail.name === name)"
x-on:close-modal.window = "visiable = false"
x-on:keydown.escape.window = "visiable = false"
style="display: none"
>
        <div class="guest-picker" style="position: absolute">
            <div class="Adult-type d-flex justify-content-between">
                <div class="guest-text pe-5">
                    <p class="title">Adults</p>
                    <p class="age">Age 18+</p>
                </div>
                <div class="incrementers d-flex justify-content-end align-items-center w-50">
                    <button  {{$this->NumberOfAdults == 0 ? 'disabled' : ''}}
                    wire:click="decrementingSystem('adult')">
                        <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
                    </button>
                    <input wire:model.live="NumberOfAdults" class="increment-value me-2 ms-2" type="text"  readonly style="font-size: 16px !important">
                    <button {{$this->CheckForTotalNumberOfGuests() ?' disabled' : ''}}
                         wire:click="incrementingSystem('adult')">
                        <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
                    </button>
                </div>
            </div>

            <div class="Children-type mb-4 mt-4 d-flex justify-content-between">
                <div class="guest-text">
                    <p class="title">Children</p>
                    <p class="age">Ages 2-17</p>
                </div>
                <div class="incrementers d-flex justify-content-end align-items-center w-50">
                    <button  {{$this->NumberOfChildrens == 0 ? 'disabled' : ''}}
                     wire:click="decrementingSystem('childrens')">
                        <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
                    </button>
                    <input wire:model.live="NumberOfChildrens" class="increment-value me-2 ms-2" type="text"  readonly style="font-size: 16px !important">
                    <button {{$this->CheckForTotalNumberOfGuests() ?' disabled' : ''}}
                    wire:click="incrementingSystem('childrens')">
                        <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
                    </button>
                </div>
            </div>


            <div class="Infants-type d-flex justify-content-between">
                <div class="guest-text">
                    <p class="title">Infants</p>
                    <p class="age">Under 2</p>
                </div>
                <div class="incrementers d-flex justify-content-end align-items-center w-50">
                    <button  {{$this->NumberOfInfants == 0 ? 'disabled' : ''}}
                     wire:click="decrementingSystem('infants')">
                        <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
                    </button>
                    <input wire:model.live="NumberOfInfants" class="increment-value me-2 ms-2" type="text"  readonly style="font-size: 16px !important">
                    <button  {{$this->NumberOfInfants == $this->max_infants ? 'disabled' : ''}}
                    wire:click="incrementingSystem('infants')">
                        <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
                    </button>
                </div>

            </div>

        </div>
</div>