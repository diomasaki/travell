


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/font-awesome.min.css">
    <title>Paket Wisata</title>
</head>
<body>
  @include('components.navbar')
    <div class="listbr">
      <div class="listContainer">
        <div class="listWrapper">
          <div class="listSearch">
            <h1 class="lsTitle">Form Pencarian</h1>
          <form action="{{ route('pencarian-paketwisata-filter') }}" method="POST" class="pencarian-paketwisata-filter" id="myForm">
            @csrf
            <div class="lsItem">
              <label>Kabupaten/Kota</label>
              <select name="kota" id="kota" class="kabupaten">
                    <option disabled selected>Pilih</option>
                @foreach ($kotaOptions as $kotaOption)
                    <option value="{{ $kotaOption }}">{{ $kotaOption }}</option>
                @endforeach
                </select>
            </div>
            <div class="lsItem">
              <label>Estimasi Budget /<small> per orang</small></label>
              <input placeholder="Budget" type="number" name="estimasibudget"/>
            </div>
            <div class="lsItem">
              <label>Kategori</label>
              <div class="lsOptions">
                <div class="lsOptionItem">
                  <span for="budaya" class="lsOptionText">
                     Budaya
                  </span>
                  <input id="budaya" type="checkbox" class="lsOptionInput" name="kategoribudaya" value="Budaya" />
                </div>
                <div class="lsOptionItem">
                  <span id="pantai" class="lsOptionText">
                    Pantai
                  </span>
                  <input for="pantai" type="checkbox" class="lsOptionInput" name="kategoripantai" value="Pantai"/>
                </div>
                <div class="lsOptionItem">
                  <span id="religi" class="lsOptionText">Religi</span>
                  <input
                    for="religi"
                    type="checkbox"
                    name="kategorireligi"
                    value="Religi"
                    class="lsOptionInput"
                    placeholder="Dewasa"
                  />
                </div>
                <div class="lsOptionItem">
                  <span id="alam" class="lsOptionText">Alam</span>
                  <input
                    for="alam"
                    type="checkbox"
                    value="Alam"
                    name="kategorialam"
                    class="lsOptionInput"
                    placeholder="Anak Kecil"
                  />
                </div>
                <div class="lsOptionItem">
                  <span id="minat" class="lsOptionText">Minat Khusus</span>
                  <input
                    for="minat"
                    name="kategoriminat"
                    type="checkbox"
                    value="Minat Khusus"
                    class="lsOptionInput"
                    placeholder="Kamar"
                  />
                </div>
                 <!-- Hidden input field for combined categories -->
                 <input type="hidden" name="combinedCategories" id="combinedCategoriesInput">
              </div>
            </div>
            <button>Search</button>
          </form>
          </div>
          <div class="listResult">
            @include('components/listpaketwisata')
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('components.footer')
</body>
</html>

<script>
    const checkboxes = document.querySelectorAll('.lsOptionInput');
    const form = document.getElementById('myForm');

    form.addEventListener('submit', event => {
        const selectedCheckboxes = [];
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedCheckboxes.push(checkbox.value);
            }
        });

        const combinedValues = selectedCheckboxes.join(', ');

        // Set the value of the hidden input field to the combinedValues
        const combinedCategoriesInput = document.getElementById('combinedCategoriesInput');
        combinedCategoriesInput.value = combinedValues;

        // Submit the form
        form.submit();
    });
</script>


<script>

$(function () {
    const dateRangePicker = $('#date_range');
    const dayCount = $('#dayCount');

    dateRangePicker.daterangepicker({
        autoUpdateInput: false, // Prevent the input from updating automatically
        locale: {
            format: 'YYYY-MM-DD', // Set the desired date format
            cancelLabel: 'Clear', // Label for the clear button
        },
    });

    // Handle date range selection and validation
    dateRangePicker.on('apply.daterangepicker', function (ev, picker) {
        const startDate = picker.startDate;
        const endDate = picker.endDate;

        // Calculate the number of days between two dates
        const daysDiff = endDate.diff(startDate, 'days') + 1; // Adding 1 to include both start and end dates

            // Update the input field with the selected date range
            dateRangePicker.val(startDate.format('YYYY-MM-DD') + ' - ' + endDate.format('YYYY-MM-DD'));

            // Display the number of days
            dayCount.text(` (${daysDiff} hari)`); // Display the count in parentheses
            $('#daysDiffInput').val(daysDiff);
    });

    // Handle clearing the date range
    dateRangePicker.on('cancel.daterangepicker', function () {
        $(this).val('');
        dayCount.text(''); // Clear the day count when clearing the date range
    });
});
</script>