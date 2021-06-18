@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="card card-chart">
                <div class="card-header">
                    Homme Femme Chart
                </div>
                <div class="card-body1 justify-content-center">
                    <div id="homme-femme-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card card-chart">
                <div class="card-header">
                    Histogramme Tranche D'Ages
                </div>
                <div class="card-body">
                    <canvas id="tranche-age"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-6 col-md-6">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Recommendations</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter">
                            <thead class="text-primary">
                                <tr>
                                    <th>Recommendation</th>
                                    <th>taux de glycémie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recommendations as $recommendation)
                                    <tr>
                                        <td>{{ $recommendation->rec }}</td>
                                        <td>{{ $recommendation->tauxGL }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Diagramme NHL
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-nhl">
                            Voir Plus
                          </button>
                    </div>
                    <div class="modal fade" id="modal-nhl" tabindex="-1" role="dialog" aria-labelledby="modal-nhlTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modal-nhlTitle">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="card-body2">
                    <div id="nhl-chart"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
    <div class="col-6">
    <div class="card card-chart">
        <div class="card-header ">
            Diagramme Chord
            <div class="float-right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-chord">
                    Voir Plus
                </button>
            </div>
            <div class="modal fade" id="modal-chord" tabindex="-1" role="dialog" aria-labelledby="modal-chordTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-chordTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body" style="text-align: center;"">
            <div class="chord-chart"></div>
        </div>
        <div class="card-footer">
            <div border="1"  id="legende" class="form-group" style="margin-left: 100px;">
                <TABLE border="0" >
                    <TR>
                        <TD class="col-lg-1" bgcolor=#DF0101></TD>
                        <TD class=" col-lg-3 text-center"><FONT COLOR="#6D7373">Blood sugar levels</FONT></TD>
                        <TD  class="col-lg-1 " bgcolor=#08088A></TD>
                        <TD  class="col-lg-1 text-center"><FONT COLOR="#6D7373">Temperature</FONT></TD>
                        <TD  class="col-lg-1" bgcolor=#22D83A></TD>
                        <TD class="col-lg-1 text-center" ><FONT COLOR="#6D7373">Location</FONT></TD>

                    </tr>

                </TABLE>
            </div>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card card-chart">
        <div class="card-header ">
            Diagramme Voronoi
            <div class="float-right">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-voronoi">
                    Voir Plus
                </button>
            </div>
            <div class="modal fade" id="modal-voronoi" tabindex="-1" role="dialog" aria-labelledby="modal-voronoiTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-voronoiTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="voronoi-chart"></div>
        </div>
    </div>
</div>
</div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-tasks">
                <div class="card-header ">
                    <h6 class="title d-inline">Articles</h6>
                    <div class="float-right">

                        <form class="example" action="{{ url('/recherche') }}" style="margin:auto;max-width:300px" method="POST">
                            @csrf

                            <input type="text" name="auteur" placeholder="Search.." >
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>


                </div>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->titre }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>
                                        <a href="{{ route('article.read', ['article' => $article->id]) }}" class="btn btn-primary">Lire</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>








@endsection

@push('js')
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawNHLChart);

        function drawNHLChart() {
            axios.get('http://localhost:8000/data/nhl')
            .then(response => {
                    var options = {'title':'Repartition des taux des glucose',
                       'width':400,
                       'height':300};

                    var data = new google.visualization.DataTable();

                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    var rows = []
                    for (let index = 0; index < response.data.data.length; index++) {
                        rows.push([response.data.labels[index], response.data.data[index]])
                    }
                    data.addRows(rows);

                    var chart = new google.visualization.PieChart(document.getElementById('nhl-chart'));
                    chart.draw(data, options);

                })
        }
        function drawChart() {
            axios.get('http://localhost:8000/data/homme-femme-chart')
                .then(response => {
                    var options = {'title':'Repartition Homme/Femme',
                       'width':400,
                       'height':300};

                    var data = new google.visualization.DataTable();

                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    var rows = []

                    for (let index = 0; index < response.data.data.length; index++) {
                        rows.push([response.data.labels[index], response.data.data[index]])
                    }

                    data.addRows(rows);

                    var chart = new google.visualization.PieChart(document.getElementById('homme-femme-chart'));
                    chart.draw(data, options);

                })
        }
    </script>
    <script>
        axios.get('http://localhost:8000/api/chord/data')
        .then(response => {
            const { matrix, nameProvider } = response.data
            let NameProvider = nameProvider
            var colours = ['#DF0101', 'rgb(250,88,88)', '#F78181', '#08088A', '#0040FF', '#A9D0F5', '#5FB404', '#ACFA58', '#C5FF87'];  //'rgba(172,250,35,.50)'];
            var cvert=['#B0F2B6','#98FB98','#90EE90','#BEF574','#9FE855','#A5D152','#7FDD4C','#C2F732','#ADFF2F','#7FFF00','#7CFC00','#00FF00','#32CD32','#85C17E','#54F98D','#00FF7F', '#00FA9A','#9ACD32','#F5FFFA','#F0FFF0','#B0F2B6','#98FB98','#ccffcc','#e6ffe6','#009900','#00e600','#1aff1a','#66ff66'];

            var cl=colours.length;
            for (var i = cl; i < nameProvider.length; i++) {
                var rand = Math.floor(Math.random()*cvert.length) + 0;

                colours.push(cvert[rand]);
            }
            var svg = d3.select(".chord-chart")
                        .append("svg")
                        .attr("width", 500)
                        .attr("height", 500)

            var width = + svg.attr('width')
            var height = + svg.attr('height')
            var outerRadius = Math.min(width, height) * 0.5- 100
            var innerRadius = outerRadius - 18

            var formatValue = d3.formatPrefix(',.0', 1e3);

            var chord = d3.chord()
            .padAngle(0.1)
            .sortSubgroups(d3.descending)

            var arc = d3.arc()
            .innerRadius(innerRadius)
            .outerRadius(outerRadius)

            var ribbon = d3.ribbon()
            .radius(innerRadius)

            var color = d3.scaleOrdinal()
            .domain(d3.range(nameProvider.length))
            .range(colours)

            var g = svg.append('g')
                .attr('transform', 'translate(' + width / 2 + ',' + height / 2 + ')')
            .datum(chord(matrix))

            var group = g.append('g')
                .attr('class', 'groups')
                .selectAll('g')
                .data(function (chords) { return chords.groups })
                .enter().append('g')


            // Function to create the unique id for each chord gradient
            function getGradID (d) { return 'linkGrad-' + d.source.index + '-' + d.target.index }

            // Create the gradients definitions for each chord
            var grads = svg.append('defs').selectAll('linearGradient')
                .data(chord(matrix))
                .enter().append('linearGradient')
                // Create the unique ID for this specific source-target pairing
                .attr('id', getGradID)
                .attr('gradientUnits', 'userSpaceOnUse')
                // Find the location where the source chord starts
                .attr('x1', function (d, i) { return innerRadius * Math.cos((d.source.endAngle - d.source.startAngle) / 2 + d.source.startAngle - Math.PI / 2) })
                .attr('y1', function (d, i) { return innerRadius * Math.sin((d.source.endAngle - d.source.startAngle) / 2 + d.source.startAngle - Math.PI / 2) })
                // Find the location where the target chord starts
                .attr('x2', function (d, i) { return innerRadius * Math.cos((d.target.endAngle - d.target.startAngle) / 2 + d.target.startAngle - Math.PI / 2) })
                .attr('y2', function (d, i) { return innerRadius * Math.sin((d.target.endAngle - d.target.startAngle) / 2 + d.target.startAngle - Math.PI / 2) })

            // Set the starting color (at 0%)
            grads.append('stop')
                .attr('offset', '0%')
            .attr('stop-color', function (d) { return color(d.source.index) })

            // Set the ending color (at 100%)
            grads.append('stop')
                .attr('offset', '100%')
            .attr('stop-color', function (d) { return color(d.target.index) })

            group.append('path')
                .style('fill', function (d) { return color(d.index) })
                .style('stroke', function (d) { return d3.rgb(color(d.index)).darker() })
                .attr('d', arc)

            g.append('g')
                .attr('class', 'ribbons')
                .selectAll('path')
                .data(function (chords) { return chords })
                .enter().append('path')
                .attr('d', ribbon)
                // change the fill to reference the unique gradient ID of the source-target combination
                .style('fill', function (d) { return 'url(#' + getGradID(d) + ')' })
            .style('opacity', 0.20)
                .style('stroke', function (d) { return d3.rgb(color(d.target.index)).darker() })

            group.append('svg:text')
                .each(function (d) { d.angle = (d.startAngle + d.endAngle) / 2 })
                .attr('dy', '.35em')
                .attr('class', 'titles')
                .attr('text-anchor', function (d) { return d.angle > Math.PI ? 'end' : null })
                .attr('transform', function (d) {
                    return 'rotate(' + (d.angle * 180 / Math.PI - 90) + ')' + 'translate(' + (innerRadius + 40) + ')' + (d.angle > Math.PI ? 'rotate(180)' : '')//label distace par rapport au cercle
            })
            .attr('opacity', 0.80)//opacité label
            .text(function (d, i) { return nameProvider[i] })

            /*
            var colors = ["#C4C4C4","#69B40F","#EC1D25","#C8125C","#008FC8","#10218B","#134B24","#737373","33FFDA"];

            var svg = d3.select(".chord-chart")
                        .append("svg")
                        .attr("width", 500)
                        .attr("height", 500)
                        .append("g")
                        .attr("transform", "translate(220,220)")
            var res = d3.chord()
                .padAngle(0.05)
                .sortSubgroups(d3.descending)(matrix)
            svg
                .datum(res)
                .append("g")
                .selectAll("path")
                .data(function(d) { return d; })
                .enter()
                .append("path")
                    .attr("d", d3.ribbon()
                    .radius(190)
                    )
                .style("fill", function(d){ return(colors[d.source.index]) })
                .style("stroke", "black");

            var group = svg
                .datum(res)
                .append("g")
                .selectAll("g")
                .data(function(d) { return d.groups; })
                .enter()

            group.append("g")
                .append("path")
                .style("fill", "grey")
                .style("stroke", "black")
                .attr("d", d3.arc()
                .innerRadius(190)
                .outerRadius(200)
                )

            group
                .selectAll(".group-tick")
                .data(function(d) { return groupTicks(d, 25); })    // Controls the number of ticks: one tick each 25 here.
                .enter()
                .append("g")
                .attr("transform", function(d) { return "rotate(" + (d.angle * 180 / Math.PI - 90) + ") translate(" + 200 + ",0)"; })
                .append("line")               // By default, x1 = y1 = y2 = 0, so no need to specify it.
                .attr("x2", 6)
                .attr("stroke", "black")

            group
                .selectAll(".group-tick-label")
                .data(function(d) { return groupTicks(d, 25); })
                .enter()
                .filter(function(d) { return d.value % 25 === 0; })
                .append("g")
                .attr("transform", function(d) { return "rotate(" + (d.angle * 180 / Math.PI - 90) + ") translate(" + 200 + ",0)"; })
                .append("text")
                .attr("x", 8)
                .attr("dy", ".35em")
                .attr("transform", function(d) { return d.angle > Math.PI ? "rotate(180) translate(-16)" : null; })
                .style("text-anchor", function(d) { return d.angle > Math.PI ? "end" : null; })
                .text(function(d) { return d.value })
                .style("font-size", 12)

            function groupTicks(d, step) {
                var k = (d.endAngle - d.startAngle) / d.value;
                return d3.range(0, d.value, step).map(function(value) {
                    return {value: value, angle: value * k + d.startAngle};
                });
            }*/

        })

    </script>
    <script>
       axios.get('http://localhost:8000/data/voronoi')
       .then(res => {
            let datas = res.data
            var margin = {top: 25, right: 5, bottom: 20, left: 30},
            width = 500 - margin.left - margin.right,
            height = 500 - margin.top - margin.bottom;
            var svg = d3.select("#voronoi-chart").append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate("+ margin.left + "," + margin.top +")");

            var x = d3.scaleLinear()
                .domain([0, 50])
                .range([0,width]);
            var y = d3.scaleLinear()
                .domain([0, 50])
                .range([height,0]);

            svg.append("g")
                .attr("transform", "translate(0," + height + ")")
                .call(d3.axisBottom(x));
            svg.append("g")
                .call(d3.axisLeft(y));

            var voronoi = d3.voronoi()
                .x(function(d) { return x(d.lng); })
                .y(function(d) { return y(d.lat); })
                .extent([[0, 0], [width, height]]);
            var voronoiGroup = svg.append("g")
                .attr("class", "voronoi");

            d3.csv("/tn.csv", types, function(error, data){
                x.domain(d3.extent(data, function(d){ return d.lng; }));
                y.domain(d3.extent(data, function(d){ return d.lat; }));

                svg.selectAll(".point")
                    .data(data)
                    .enter().append("circle")
                    .attr("class", "point")
                    .attr("r",1)
                    .attr("cx", function(d){ return x(d.lng); })
                    .attr("cy", function(d){ return y(d.lat); });
                voronoiGroup.selectAll("path")
                    .data(voronoi(data).polygons())
                    .enter().append("path")
                    .attr("d", ([d, cell]) => `M${d3.polygonCentroid(cell)}L${d}`)
                .attr("d", function(d) { return d ? "M" + d.join("L") + "Z" : null; })
            })


            function types(d){
                d.lng = +d.lng;
                d.lat = +d.lat;

                return d;
            }

            svg.selectAll(".point")
                .data(datas)
                .enter()
                .append("circle")
                .attr("r", 2)
                .attr("fill", "red")
                .attr("cx", function(d){ return x(d.x); })
                .attr("cy", function(d){ return y(d.y); })
                //.attr("d", function(d) { return d ? "M" + d.join("L") + "Z" : null; });
       })
    </script>

<script>








</script>
@endpush

