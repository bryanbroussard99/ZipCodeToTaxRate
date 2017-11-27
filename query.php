<div class="container">
    <form   method="post" 
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group" >
            <label  class="col-sm-2 col-form-label" 
                    for="ZipCodeInput">Zip Code</label> 
            <div class="col-sm-10">
                <input  class="form-control" 
                        id="ZipCodeInput" 
                        placeholder="5 Digit Zip Code" 
                        type="text" 
                        pattern="[0-9]{5}"
                        name="zipcode">
                <button type="submit" 
                        class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <?php
    $queriedZip = $_POST['zipcode'];
    $sql = "SELECT * FROM 2017SalesTax WHERE ZipCode = $queriedZip";
    $result = $conn->query($sql);
    echo "<div class=\"container-fluid\">";
        if ($result->num_rows > 0) {
            // output data of each row

            while($row = $result->fetch_assoc()) {
                echo    "<h4>Zip Code " . $row["ZipCode"] . "<br />Name: " . ucwords(strtolower($row["TaxRegionName"])) . "</h4>" .
                        "<div class=\"row\">" .
                            "<div class=\"col-sm-2\"><strong>Tax Rate:</div>" .
                            "<div class=\"col-sm-2\">" . $row["EstimatedCombinedRate"]*100 . "%</strong></div>" .
                        "</div>
                        <hr />
                        <div class=\"row\">" . 
                            "<div class=\"col-sm-2\">State Rate:</div>" .
                            "<div class=\"col-sm-2\">" . $row["StateRate"]*100 . "%</div>" .
                        "</div>" .
                        "<div class=\"row\">" .
                            "<div class=\"col-sm-2\">Parish Rate:</div>" .
                            "<div class=\"col-sm-2\">" . $row["EstimatedCountyRate"]*100 . "%</div>" . 
                        "</div>" .
                        "<div class=\"row\">" .
                            "<div class=\"col-sm-2\">City Rate:</div>" .
                            "<div class=\"col-sm-2\">" . $row["EstimatedCityRate"]*100 . "%</div>" .
                        "</div>" .
                        "<div class=\"row\">" .
                            "<div class=\"col-sm-2\">Special Rate:</div>" .
                            "<div class=\"col-sm-2\">" . $row["EstimatedSpecialRate"]*100 . "%</div>" .
                        "</div>
                    </div>";

            }
        } else {
            echo "  <div class=\"alert alert-warning\" role=\"alert\">
                        Please type a Louisiana zip code
                    </div>";
        }
        $conn->close();
    ?>
    </div>
</div>
