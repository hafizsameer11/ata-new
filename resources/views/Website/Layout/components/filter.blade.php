<div class="filter-bar container mb-4 shadow-lg p-3 rounded">
    <!-- Destinations -->
    <div class="filter d-flex justify-content-center ">
        <div class="ms-3">
            <h6 class="filter-title fs-5 fw-bold  d-flex align-items-center gap-2 mb-2"><i style="color: #EE1C25" class="fa-solid fs-5 fa-location-dot icon-red"></i>Destinations</h6>
            <select name="destination" id="destination" class="form-control pe-5 ps-1 py-2 border-0 p-0">
                <option value="">Where are you going?</option>
                <option value="japan">Japan</option>
                <option value="uk">UK</option>
                <option value="china">China</option>
            </select>
        </div>
    </div>

    <!-- Price Range -->
    <div class="filter d-flex">
        
        <div class="ms-3">
            <h6 class="filter-title fs-5 fw-bold d-flex align-items-center gap-2 mb-2"><i style="color: #EE1C25" class="fa-solid fs-5 fa-dollar-sign icon-red"></i> Price Range</h6>
            <select name="price" id="price" class="form-control ps-1 pe-5 py-2 border-0 p-0">
                <option value="">All Prices</option>
                <option value="1000-2000">1000-2000</option>
                <option value="5000-10000">5000-10000</option>
            </select>
        </div>
    </div>

    <!-- Guests -->
    <div class="filter-dropdown p-4" id="dropdown1" >
        <div class="">
            <h3 class="filter-title fs-5 fw-bold gap-1 mb-3">
                <a class="btn fs-5 fw-bold" style="width: fit-content;padding:0;" >
                    <i style="color: #EE1C25" class="fa-solid fs-5 fa-user-group icon-red"></i>Guests ( <span id="guest_quantity"></span> )<br>
                </a>
            </h3>
            <div class="d-flex align-items-center p-0 ps-4 gap-2">
                <button class="btn-minus" data-target="member">-</button>
                <input type="text" id="member" name="member" class="number-input" readonly disabled value="0"
                    min="0" max="10" style="display: none">
                <button class="btn-plus" data-target="member">+</button>
            </div>
        </div>
    </div>

    <!-- Search Button -->
    <div style="background-color:#EE1C25 " class="btn bol d-flex justify-content-center align-items-center py-2">
        <button type="submit" class="btn text-white">
            <i class="fa-solid ps-3 fs-5 fa-magnifying-glass"></i>
            Search
        </button>
    </div>
</div>