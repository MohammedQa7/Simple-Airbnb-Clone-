<div>

    <button>
        <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
    </button>
    <input  id="guest_field" class="increment-value guest-input me-2 ms-2" type="text" value="9" readonly>
    <button id="increment_guest_btn">
    <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
    </button>

            
    @script
    <script>
        document.getElementById('increment_guest_btn').addEventListener('click' , function totalClick(click){
            const Total_guest_value = 16;
            var guest_field = document.getElementById('guest_field');
            if(guest_field.value == Total_guest_value){
                guest_field.value = Total_guest_value;
            }else{
                guest_field.value++;
                $wire.set('category' , guest_field.value)
            }
            console.log($wire.category);
        });
    </script>
    @endscript

</div>
