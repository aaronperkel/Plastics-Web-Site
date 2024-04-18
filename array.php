<?php 
include 'top.php';

$plasticCount = array(
    array('0.33-1.00 mm', 68.8, 32.4, 17.6, 10.6, 45.5, 8.5, 183.0),
    array('1.01-4.75 mm', 116.0, 53.2, 26.9, 16.7, 74.9, 14.6, 302.0),
    array('4.76-200 mm', 13.2, 7.3, 4.4, 2.4, 9.2, 1.6, 38.1),
    array('>200 mm', 0.3, 0.2, 0.1, 0.05, 0.2, 0.04, 0.9),
    array('Total', 199.0, 93.0, 49.1, 29.7, 130.0, 24.7, 525.0)
);
?>
        <main>
            <h1>Expedition</h1>
            <section>
                <h2>What?</h2>
                <p>While plastic polution in the the world's oceans is a very well known topic,
                    data on the abundance of plastic in the ocean is lacking. Collecting data 
                    on a specific number of plastic items has been proven very challenging. Below
                    is an estiamte of the total number of plastic particles floating in the world's oceans.
                    This data is from 24 expeditions between 2007 and 2013. These expeditions traveled all 
                    five sub-tropical gyres, coastal Australia, the Bay of Bengal, and the Mediterranean Sea.
                    The data was colleceted using surface net tows as well as visual survey transects of 
                    large plastic debris.
                </p>
                <figure class="roundedCorners ">
                    <img src="../images/data.png" alt="Field locations where count density was measured. " class="roundedCorners">
                    <figcaption>Field locations where count density was measured.
                        <cite><a href="https://www.semanticscholar.org/reader/0d4c5532c402a656750131c4e1ffeef9aa70531f" target="_blank">Source</a></cite>
                    </figcaption>
                </figure> 
            </section>
            <section>
                <h2>How?</h2>
                <p>This data suggests that there are <em>more than five trillion plastic pieces weighing over 
                    250,000 tons</em> in our world's oceans. The data, along with an oceanographic model of 
                    floating debris dispersal, and correcting for wind driven vertical mixing effects, it is estimated that
                    this number is very close to correct. When comparing between four size classes, two 
                    microplastic &lt;4.75mm and meso- and macroplastic &gt;4,75mm, a tremendous loss of microplastics
                    is observed from the sea surface compared to expected rates. This suggests that there are mechanisms 
                    at play that remove &lt;4.75mm plastic particles from the ocean surface.
                </p>
                <p>Source: <cite><a href="https://www.semanticscholar.org/reader/0d4c5532c402a656750131c4e1ffeef9aa70531f"
                    target="_blank">Semantic Scholar</a></cite></p>
            </section>
            <section>
                <h3>The Data</h3>
                <table>
                    <caption>Model results for the total particle count of plastic floating in <?php print count($plasticCount) ?> locations of the world's oceans.</caption>
                    <tr>
                        <th>Size Class</th>
                        <th>NP</th>
                        <th>NA</th>
                        <th>SP</th>
                        <th>SA</th>
                        <th>IO</th>
                        <th>MED</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    foreach ($plasticCount as $data) {
                        print '<tr>';
                        print '<td>' . $data[0] . '</td>' . PHP_EOL;
                        print '<td>' . $data[1] . '</td>' . PHP_EOL;
                        print '<td>' . $data[2] . '</td>' . PHP_EOL;
                        print '<td>' . $data[3] . '</td>' . PHP_EOL;
                        print '<td>' . $data[4] . '</td>' . PHP_EOL;
                        print '<td>' . $data[5] . '</td>' . PHP_EOL;
                        print '<td>' . $data[6] . '</td>' . PHP_EOL;
                        print '<td>' . $data[7] . '</td>' . PHP_EOL;
                        print '</tr>' . PHP_EOL;
                    }
                    ?>
                    <tr>
                        <td colspan="8">
                        <cite>Estimated total count (n x 10<sup>10</sup> pieces) of plastic in the North Pacific (NP), North Atlantic (NA), South Pacific (SP), South Atlantic (SA), Indian Ocean (10), Mediterranean Sea (MED), and the global ocean (Total). Estimates were calculated after correcting for vertical distribution of microplastics.</cite>
                        <br>
                        <cite>Data from Semantic Scholar <a
                        href="https://www.semanticscholar.org/paper/Plastic-Pollution-in-the-World%27s-Oceans%3A-More-than-Eriksen-Lebreton/0d4c5532c402a656750131c4e1ffeef9aa70531f/figure/1"
                        target="_blank">Data Table</a></cite></td>
                    </tr>
                </table>
            </section>
        </main>
        <?php include 'footer.php'; ?> 