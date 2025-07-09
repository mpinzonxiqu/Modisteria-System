<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Reportes</title>
    <!-- Agregar los scripts de amCharts -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>
<body>

    <div id="chartdiv" style="width: 100%; height: 500px;"></div>

    <script>
        am5.ready(function() {
            var data = @json($reports);

            // Crear el elemento root
            var root = am5.Root.new("chartdiv");

            // Configurar el tema
            root.setThemes([am5themes_Animated.new(root)]);

            // Crear la gráfica
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelY: "none"
            }));

            chart.zoomOutButton.set("forceHidden", true);

            // Crear los ejes
            var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
                baseInterval: { timeUnit: "day", count: 1 },
                renderer: am5xy.AxisRendererX.new(root, { minGridDistance: 70 }),
                tooltip: am5.Tooltip.new(root, {})
            }));

            var distanceAxisRenderer = am5xy.AxisRendererY.new(root, {});
            distanceAxisRenderer.grid.template.set("forceHidden", true);
            var distanceAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: distanceAxisRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            // Crear las series
            var distanceSeries = chart.series.push(am5xy.ColumnSeries.new(root, {
                xAxis: xAxis,
                yAxis: distanceAxis,
                valueYField: "distance",
                valueXField: "date",
                tooltip: am5.Tooltip.new(root, { labelText: "{valueY} miles" })
            }));

            // Configura el formato de fecha en los datos
            distanceSeries.data.processor = am5.DataProcessor.new(root, {
                dateFields: ["date"],
                dateFormat: "yyyy-MM-dd"
            });

            // Asigna los datos de la base de datos a la serie
            distanceSeries.data.setAll(data);

            // Configura el cursor
            chart.set("cursor", am5xy.XYCursor.new(root, {
                xAxis: xAxis,
                yAxis: distanceAxis
            }));

            // Animaciones
            distanceSeries.appear(1000);
            chart.appear(1000, 100);
        });
    </script>
</body>
</html>
