<?php include 'top.php'; ?>
        <main>
            <h1>Why should we use them?</h1>
            <section>
                <h2>Introduction</h2>
                <figure class="roundedCorners ">
                    <img src="../images/plastic-water-bottles.jpg" alt="Plastic water bottles floating in a body of water" class="roundedCorners">
                    <figcaption>Plastic water bottles floating in a body of water
                        <cite><a href="https://www.foodandwaterwatch.org/2018/07/30/were-literally-eating-and-drinking-plastic-fossil-fuels-are-to-blame/" target="_blank">Source</a></cite>
                    </figcaption>
                </figure>
                <p>Every year, the United States uses almost fifty million single use plastic
                    water bottles. This number is shocking, because it can take 
                    <a href="https://www.forgerecycling.co.uk/blog/how-long-it-takes-everyday-items-to-decompose/" target="_blank">up to
                    500 years</a> for a plastic water bottle to decompose. Almost all of these bottles
                    will one day end up in a landfill, or a waterway. This makes them one of the 
                    biggest contributors to detrimental environmental impacts and things like stormwater
                    pollution. One of the easiest way to solve this issue is to just use less single use plastic bottles
                    and to opt in to using a reusable water bottle.
                </p>
            </section>
            <section>
                <h2>Why Make the Switch?</h2>
                <p>There are many reasons why making the switch to reusable water bottles
                    is a good idea. The first one is that plastic water bottles are already one
                    of the top littered items in the waterways and oceans. It is even worse that 
                    seeing plastic bottles and plastic containers on beaches and in rivers is just
                    a normal everyday thing for most people. Even if you do use single use water bottles
                    and you end up recycling them, only 23% of recylced plastic bottles are actually
                    recycled. Not only that, but 32% of recycled plastic ends up in the ocean anyway. 
                    By 2050, there might be more plastic in the ocean than there is fish. Also, some 
                    estimates show by using reusable bottles, you could save just over $6,000 in just five years.
                </p>
                <p>Source: <cite><a href="https://projectcleanwater.org/5-reasons-to-opt-for-reusable-water-bottles/"
                    target="_blank">Project Clean Water</a></cite></p>
            </section>
            <section>
                <h2>Facts</h2>
                <table>
                    <caption>Plastic Pollution by Country</caption>
                    <tr>
                        <th>Country</th>
                        <th>Mismanaged Plastic Waste</th>
                        <th>Plastic Marine Debris</th>
                        <th>Population</th>
                    </tr>
                    <?php
                    $sql = 'SELECT fldCountry, fldAmount, fldAmountOcean, fldPopulation FROM tblPollutionCountry';
                    $statement = $pdo->prepare($sql);
                    $statement->execute();

                    $records = $statement->fetchAll();

                    foreach($records as $record) {
                        print '<tr>';
                        print '<td>' . $record['fldCountry'] . '</td>';
                        print '<td>' . $record['fldAmount'] . '</td>';
                        print '<td>' . $record['fldAmountOcean'] . '</td>';
                        print '<td>' . $record['fldPopulation'] . '</td>';
                        print '</tr>' . PHP_EOL;
                    }
                    ?>
                    <tr>
                        <td colspan="4">Source: <cite><a href="https://www.jerseyislandholidays.com/plastic-bottle-pollution-statistics/" 
                            target="_blank">Jersey Island Holidays</a></cite>
                        </td>
                    </tr>
                </table>
                <h3>Quick Stats about Plastic Water Bottles</h3>
                <ul>
                    <li>1,500 plastic bottles are thrown away every second.</li>
                    <li>480 plastic bottles were bought across the world in 2019.</li>
                    <li>91% of the world's plastic bottles are not recycled.</li>
                    <li>Source: <cite><a href="https://www.jerseyislandholidays.com/plastic-bottle-pollution-statistics/#:~:text=The%20average%20person%20uses%20156%20plastic%20bottles%20per%20year.,-There%20are%2066&text=60%20million%20plastic%20water%20bottles,with%20only%2012%25%20being%20recycled."
                    target="_blank">Jersey Island Holidays</a></cite></li>
                </ul>
            </section>
        </main>
        <?php include 'footer.php'; ?>      