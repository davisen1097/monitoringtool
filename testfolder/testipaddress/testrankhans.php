<!DOCTYPE html>
<html lang="en">

<body>
   
        <form action="#" method="get">
            <input type="text" name="weburl" id="weburl">
            <input type="submit" name="submit" value="Submit">
        </form>


       
            <?php
            if (isset($_GET['submit'])) {
                $url = $_GET['weburl'];
                $xml = simplexml_load_file('http://data.alexa.com/data?cli=10&dat=snbamz&url=' . $url);
                $rank = isset($xml->SD[1]->POPULARITY) ? $xml->SD[1]->POPULARITY->attributes()->TEXT : 0;
                $web = (string)$xml->SD[0]->attributes()->HOST;
                echo "<h3>testing hanstesting hanstesting hans$web has Alexa Rank $rank testing hans </h3>";
                $country = isset($xml->SD[1]->COUNTRY) ? $xml->SD[1]->COUNTRY->attributes()->NAME : 0;
                echo "<h3>$web is found in $country </h3>";
                $ranking = isset($xml->SD[1]->COUNTRY) ? $xml->SD[1]->COUNTRY->attributes()->RANK : 0;
                $countrycode = isset($xml->SD[1]->COUNTRY) ? $xml->SD[1]->COUNTRY->attributes()->CODE : 0;
                echo "<h3>$web is ranked $ranking in $countrycode</h3>";
                $worldrank = isset($xml->SD[1]->REACH) ? $xml->SD[1]->REACH->attributes()->RANK : 0;
                echo "<h3>$web is ranked $worldrank internationally</h3>";
				
            }

            ?>
       
</body>

</html>
