<?php
include('head.php');
?>
<style>
    /* Container and heading styles */
#services .container {
    text-align: center;
}

/* Centering the table and ensuring proper alignment */
.menu_table {
    width: 100%;
    max-width: 800px; /* Adjust based on your design needs */
    margin: 20px auto; /* Center the table horizontally */
    border-collapse: collapse;
}

.menu_table th, .menu_table td {
    padding: 10px;
    text-align: center;
}

.head-widget th {
    font-size: 16px;
    color: #fff;
    background-color: #e25111;
}

.menu_widget tr:nth-child(odd) {
    background-color: antiquewhite;
}

.menu_widget tr:nth-child(even) {
    background-color: rgba(226, 81, 17, 0);
}
.menu_widget tr:hover {
    background-color: #f5f5f5; /* Light gray color on hover */
}

</style>
<section id="Event_head">
  <div class="heading_dinner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content_abouts_head">
            <h2 class="title">Items &nbsp; &amp; &nbsp; Stalls</h2>
            <p>We have Every Item available</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="services" class="padding-bottom">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Changed col-md-8 to col-md-12 for full width -->
            <h2 class="heading text-center">Dinner and Desserts</h2>
            <hr class="heading_space">
            <table class="menu_table">
  <thead>
    <tr class="head-widget">
      <th>Item</th>
      <th>Price</th>
      <th>Stall No.</th>
    </tr>
  </thead>
  <tbody class="menu_widget">
    <tr>
      <td><span>Grilled Chicken</span></td>
      <td><span>Rs. 100</span></td>
      <td><span>5</span></td>
    </tr>
    <tr>
      <td><span>Cheesecake</span></td>
      <td><span>Rs. 60</span></td>
      <td><span>2</span></td>
    </tr>
    <tr>
      <td><span>Pasta Alfredo</span></td>
      <td><span>Rs. 80</span></td>
      <td><span>3</span></td>
    </tr>
    <tr>
      <td><span>Chocolate Cake</span></td>
      <td><span>Rs. 50</span></td>
      <td><span>4</span></td>
    </tr>
    <tr>
      <td><span>Chicken Biryani</span></td>
      <td><span>Rs. 150</span></td>
      <td><span>6</span></td>
    </tr>
    <tr>
      <td><span>Paneer Tikka</span></td>
      <td><span>Rs. 120</span></td>
      <td><span>7</span></td>
    </tr>
    <tr>
      <td><span>Butter Chicken</span></td>
      <td><span>Rs. 180</span></td>
      <td><span>8</span></td>
    </tr>
    <tr>
      <td><span>Samosa</span></td>
      <td><span>Rs. 30</span></td>
      <td><span>9</span></td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
</section>

<section id="services" class="padding-bottom">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Changed col-md-8 to col-md-12 for full width -->
            <h2 class="heading text-center">Drinks and Mocktails</h2>
            <hr class="heading_space">
            <table class="menu_table">
              <thead>
                <tr class="head-widget">
                  <th>Item</th>
                  <th>Price</th>
                  <th>Stall No.</th>
                </tr>
              </thead>
              <tbody class="menu_widget">
                <tr>
                  <td><span>Mango Lassi</span></td>
                  <td><span>Rs. 80</span></td>
                  <td><span>13</span></td>
                </tr>
                <tr>
                  <td><span>Virgin Mojito</span></td>
                  <td><span>Rs. 90</span></td>
                  <td><span>54</span></td>
                </tr>
                <tr>
                  <td><span>Pineapple Juice</span></td>
                  <td><span>Rs. 70</span></td>
                  <td><span>43</span></td>
                </tr>
                <tr>
                  <td><span>Strawberry Shake</span></td>
                  <td><span>Rs. 85</span></td>
                  <td><span>86</span></td>
                </tr>
                <!-- Additional Mocktail Items -->
                <tr>
                  <td><span>Blue Lagoon</span></td>
                  <td><span>Rs. 100</span></td>
                  <td><span>15</span></td>
                </tr>
                <tr>
                  <td><span>Peach Iced Tea</span></td>
                  <td><span>Rs. 75</span></td>
                  <td><span>96</span></td>
                </tr>
                <tr>
                  <td><span>Watermelon Cooler</span></td>
                  <td><span>Rs. 95</span></td>
                  <td><span>7</span></td>
                </tr>
                <tr>
                  <td><span>Apple Mint Fizz</span></td>
                  <td><span>Rs. 85</span></td>
                  <td><span>78</span></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
  </div>
</section>

<section id="services" class="padding-bottom">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Changed col-md-8 to col-md-12 for full width -->
            <h2 class="heading text-center">Ice Creams</h2>
            <hr class="heading_space">
            <table class="menu_table">
              <thead>
                <tr class="head-widget">
                  <th>Item</th>
                  <th>Price</th>
                  <th>Stall No.</th>
                </tr>
              </thead>
              <tbody class="menu_widget">
                <tr>
                  <td><span>Vanilla Ice Cream</span></td>
                  <td><span>Rs. 60</span></td>
                  <td><span>10</span></td>
                </tr>
                <tr>
                  <td><span>Chocolate Sundae</span></td>
                  <td><span>Rs. 70</span></td>
                  <td><span>11</span></td>
                </tr>
                <tr>
                  <td><span>Strawberry Sorbet</span></td>
                  <td><span>Rs. 65</span></td>
                  <td><span>12</span></td>
                </tr>
                <tr>
                  <td><span>Mint Chocolate Chip</span></td>
                  <td><span>Rs. 75</span></td>
                  <td><span>13</span></td>
                </tr>
                <!-- Additional Ice Cream Items -->
                <tr>
                  <td><span>Mango Gelato</span></td>
                  <td><span>Rs. 80</span></td>
                  <td><span>14</span></td>
                </tr>
                <tr>
                  <td><span>Butter Pecan</span></td>
                  <td><span>Rs. 85</span></td>
                  <td><span>15</span></td>
                </tr>
                <tr>
                  <td><span>Caramel Swirl</span></td>
                  <td><span>Rs. 90</span></td>
                  <td><span>16</span></td>
                </tr>
                <tr>
                  <td><span>Cookies and Cream</span></td>
                  <td><span>Rs. 70</span></td>
                  <td><span>17</span></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
  </div>
</section>


<?php
include('foot.php');
?>
