<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid rgba(0,0,0,0.2);
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
    font-size: 16px;
    outline: none;
}

input:focus[type="text"] {
    border: 1px solid #7895cf;
}

#addNama {
    padding: 5px 10px;
    background-color: rgb(31 41 55);
    color: #fff;
    border: none;
    display: flex;
    justify-content: center;
    border-radius: 4px;
    cursor: pointer;    
    &:hover{
        transition: all 200ms ease-in-out;
        opacity: 0.9;
    }
}

#addKtp {
    margin-top: 10px;
    padding: 5px 10px;
    background-color: rgb(31 41 55);
    color: #fff;
    border: none;
    border-radius: 4px;
    display: flex;
    justify-content: center;
    cursor: pointer;
    &:hover{
        transition: all 200ms ease-in-out;
        opacity: 0.9;
    }
}

    </style>

<body>
<div class="reserve">
    <div class="rContainer">
    <form action="{{ route('xendit') }}" method="POST">
        @csrf
    <div class="lsItem">
        <label for="date_range" class="ff-22">Pilih Rentang Tanggal</label>
        <input type="text" id="date_range_forall" name="date_range" placeholder="Pilih Rentang Tanggal" class="ff-22" />
        <input type="hidden" name="totalhargaforall" value="{{$results->price }}">
        <span id="dayCount_forall" class="ff-22"></span>
        <input type="hidden" id="daysDiffInput" name="jumlahh_hari" class="ff-22" value="">
    </div>
    <div class="lsItem">
        <label class="ff-22">Jumlah Orang</label>
        <input placeholder="Jumlah Orang" type="text" name="jumlah_orang" class="ff-22"/>
    </div>
    <div class="lsItem">
        <div id="namaInputs">
            <!-- Initial "Nama" input and label -->
            <div class="namaInputContainer">
                <label for="nama1" class="ff-22">Nama 1</label>
                <input type="text" id="nama1" name="nama[]" placeholder="Nama 1" class="ff-22" />
            </div>
        </div>
        <span id="addNama">Tambah</span>
    </div>
    <div class="lsItem">
        <div id="ktpInputs">
            <!-- Initial "Nama" input and label -->
            <div class="newktpContainer">
                <label for="ktp1" class="ff-22">KTP 1</label>
                <input type="text" id="ktp1" name="ktp[]" placeholder="KTP 1" class="ff-22" />
            </div>
        </div>
        <span id="addKtp">Tambah</span>
    </div>
    <input type="hidden" name="totalharga" value="{{ ($results->price)}}">
    <input type="hidden" name="payer_email" value="{{ $userEmail }}">
    <input type="hidden" name="description" value="Pembayaran Tiket {{ $results->name }}">
    <button type="submit" class="rButton">
        Bayar
    </button>
    </form>
    </div>
</div>
</body>
</html>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const namaInputs = document.getElementById("namaInputs");
    const addNamaButton = document.getElementById("addNama");
    let namaCounter = 1; // Counter for incrementing labels

    addNamaButton.addEventListener("click", function () {
        if (namaCounter < 2) {

            namaCounter++;
            
            const newNamaContainer = document.createElement("div");
            newNamaContainer.classList.add("namaInputContainer");
            
        const newLabel = document.createElement("label");
        newLabel.setAttribute("for", "nama" + namaCounter);
        newLabel.textContent = "Nama " + namaCounter;
        
        const newNamaInput = document.createElement("input");
        newNamaInput.setAttribute("type", "text");
        newNamaInput.setAttribute("id", "nama" + namaCounter);
        newNamaInput.setAttribute("name", "nama[]"); // Use array for the input names
        newNamaInput.setAttribute("placeholder", "Nama " + namaCounter);
        
        newNamaContainer.appendChild(newLabel);
        newNamaContainer.appendChild(newNamaInput);
        
        namaInputs.appendChild(newNamaContainer);
        }else {
            addNamaButton.disabled = true;
            alert("Maksimal 2 nama perwakilan!")
        }
    });
});
</script>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const ktpInputs = document.getElementById("ktpInputs");
    const addKtpButton = document.getElementById("addKtp");
    let ktpCounter = 1; // Counter for incrementing labels

    addKtpButton.addEventListener("click", function () {
        if (ktpCounter < 2)
        {

            ktpCounter++;
            
            const newktpContainer = document.createElement("div");
            newktpContainer.classList.add("newktpContainer");
            
            const newLabel = document.createElement("label");
            newLabel.setAttribute("for", "ktp" + ktpCounter);
            newLabel.textContent = "KTP " + ktpCounter;
            
            const newKtpInput = document.createElement("input");
            newKtpInput.setAttribute("type", "text");
        newKtpInput.setAttribute("id", "ktp" + ktpCounter);
        newKtpInput.setAttribute("name", "ktp[]"); // Use array for the input names
        newKtpInput.setAttribute("placeholder", "KTP " + ktpCounter);
        
        newktpContainer.appendChild(newLabel);
        newktpContainer.appendChild(newKtpInput);
        
        ktpInputs.appendChild(newktpContainer);
    }else {
        addKtpButton.disabled = true;
        alert("Maksimal 2 identitas untuk perwakilan!")
    }
    });
});
</script>


<script>

$(function () {
    const dateRangePicker = $('#date_range_forall');
    const dayCount = $('#dayCount_forall');

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