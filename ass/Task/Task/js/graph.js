            // グラフ描画
            class ProgressChart {
                constructor(goal, startDate, endDate, progresses) {
                    this.goal = goal;
                    this.startDate = startDate;
                    this.endDate = endDate;
                    this.dates = [];
                    this.progresses = progresses;
                }

                generateDates() {
                    const currentDate = new Date(this.startDate);
                    const endDateObj = new Date(this.endDate);
                    while (currentDate <= endDateObj) {
                        this.dates.push(currentDate.toISOString().slice(0, 10));
                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                }

                generateDecreasedProgresses() {
                    this.decreasedProgresses = [];
                    for (let i = 0; i < this.dates.length; i++) {
                        const targetProgress = this.progresses[i] || 0;
                        const decreasedValue = this.goal - targetProgress;
                        this.decreasedProgresses.push(decreasedValue);
                    }
                }

                drawChart() {
                    const ctx = document.getElementById('progressChart').getContext('2d');
                    this.chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: this.dates,
                            datasets: [{
                                label: '進捗度',
                                data: this.decreasedProgresses,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderWidth: 5, // 線の幅を設定
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stepSize: 1,
                                    ticks: {
                                        fontSize: 14, // y軸の文字サイズを設定
                                    }
                                },
                                x: {
                                    ticks: {
                                        fontSize: 14, // x軸の文字サイズを設定
                                    }
                                }
                            },
                            plugins: {
                                annotation: {
                                    annotations: {
                                        line1: {
                                            type: 'line',
                                            scaleID: 'y',
                                            value: this.goal / 2,
                                            borderColor: 'rgba(255, 0, 0, 0.7)',
                                            borderWidth: 1,
                                            borderDash: [5, 5],
                                            label: {
                                                content: 'Goal / 2',
                                                enabled: true,
                                                position: 'right',
                                                fontSize: 14, // アノテーションの文字サイズを設定
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            }

            // 目標値と現在の進捗データ（ダミーデータ）
            const goal = 100;//進捗度全体値
            const startDate = "2023-07-01";
            const endDate = "2023-07-05";
            //左から右に進捗数の累積
            const progresses = [0, 35, 100,100,100];

            const progressChart = new ProgressChart(goal, startDate, endDate, progresses);
            progressChart.generateDates();
            progressChart.generateDecreasedProgresses();
            progressChart.drawChart();