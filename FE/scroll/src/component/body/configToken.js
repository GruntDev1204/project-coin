import React, { Component } from 'react';
import axios from 'axios';
import { CanvasJSChart } from 'canvasjs-react-charts';

class Chart extends Component {
    state = {
        data: [],
    };

    componentDidMount() {
        axios.get('http://newsndg.local:8000/api/Sndg/apiToken')
            .then(response => {
                this.setState({ data: response.data.dataToken });
            })
            .catch(error => {
                alert(error);
            });
    }

    render() {
        const { data } = this.state;
        const options = {
            backgroundColor: "#3F475C",
            toolTip: {
               enabled :false
            },
            data: [
                {
                    type: "pie",
                    startAngle: 90,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label}: {y}",
                    indexLabelFontSize: 20,
                        radius: 600,
                        dataPoints: [
                        { y: data.IDO + data.AirDrop, label: "IDO" },
                        { y: data.Farming, label: "Farming" },
                        { y: data.TeamWork, label: "Team  " },
                        { y: data.mkt_and_comunity, label: "Community and marketing" },
                    ],
                    borderColor: "#00F",
                    hoverOffset: 4,
                    indexLabelFontColor: " #FFFFFF ",
                    explodeOnClick: true,
                    explodeDistance: 20
                },
            ],
        };
        return (
              <CanvasJSChart options={options} />
        );
    }
}

export default Chart;
