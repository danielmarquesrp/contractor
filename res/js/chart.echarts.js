$(function() {
	'use strict';

	/* Echart5*/
	var chartdata3 = [
		{
		  name: 'sales',
		  type: 'bar',
		  stack: 'Stack',
		  data: [14, 18, 20, 14, 29, 21, 25, 14, 24]
		},
		{
		  name: 'Profit',
		  type: 'bar',
		  stack: 'Stack',
		  data: [12, 14, 15, 50, 24, 24, 10, 20 ,30]
		}
	];
	var option5 = {
		grid: {
		  top: '6',
		  right: '0',
		  bottom: '17',
		  left: '25',
		},
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: true,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer:
			{
				label: {
					show: false,
				}
			}
		},
		xAxis: {
		  data: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018'],
		  axisLine: {
			lineStyle: {
			  color: 'rgba(119, 119, 142, 0.2)'
			}
		  },
		  axisLabel: {
			fontSize: 10,
			color: '#77778e'
		  }
		},
		yAxis: {
		  splitLine: {
			lineStyle: {
			  color: 'rgba(119, 119, 142, 0.2)'
			}
		  },
		  axisLine: {
			lineStyle: {
			  color: 'rgba(119, 119, 142, 0.2)'
			}
		  },
		  axisLabel: {
			fontSize: 10,
			color: '#77778e'
		  }
		},
		series: chartdata3,
		color:[ '#6259ca', '#53caed']
	};
	var chart5 = document.getElementById('echart5');
	var barChart5 = echarts.init(chart5);
	barChart5.setOption(option5);



});