<div class="col-lg-12">
                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10%;">Keterangan</th>
                                                                    <th style="width: 30%;">Cent</th>
                                                                    <th style="width: 30%;">Micro</th>
                                                                    <th style="width: 30%;">Standard</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Deposit Awal</td>
                                                                    <td>Mulai dari $1</td>
                                                                    <td>Mulai dari $5</td>
                                                                    <td>Mulai dari $100</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Spread</td>
                                                                    <td>Floating spread <br>mulai dari 1 pip</td>
                                                                    <td>Fixed spread <br>mulai dari 3 pip</td>
                                                                    <td>Floating spread <br>mulai dari 1 pip</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Komisi</td>
                                                                    <td>$0</td>
                                                                    <td>$0</td>
                                                                    <td>$0</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Leverage</td>
                                                                    <td>1 : 1000</td>
                                                                    <td>1 : 3000</td>
                                                                    <td>1 : 3000</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Max Order</td>
                                                                    <td>200</td>
                                                                    <td>200</td>
                                                                    <td>200</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Volume Order</td>
                                                                    <td>0,01 - 1 000 lot cent</td>
                                                                    <td>0,01 - 500 lots</td>
                                                                    <td>0,01 - 500 lots</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Market Execution</td>
                                                                    <td>0,3 sec, STP</td>
                                                                    <td>0,3 sec, STP</td>
                                                                    <td>0,3 sec, STP</td>
                                                                    
                                                                </tr>
                                                                
                                                                <tr >
                                                                    <td><strong><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Buka Akun</button></strong></td>
                                                                    <td><a href="<?= $broker['link']?>" target="_blank"> <button type="button" class="btn btn-outline-<?= $broker['warnadasar']?> btn-lg btn-block">Akun Cent</button> </a></td>
                                                                    <td><a href="<?= $broker['link']?>" target="_blank"> <button type="button" class="btn btn-outline-<?= $broker['warnadasar']?> btn-lg btn-block">Akun Micro</button> </a></td>
                                                                    <td><a href="<?= $broker['link']?>" target="_blank"> <button type="button" class="btn btn-outline-<?= $broker['warnadasar']?> btn-lg btn-block">Akun Standard</button> </a></td>
                                                                    
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10%;">Keterangan</th>
                                                                    <th style="width: 30%;">Zero Spread</th>
                                                                    <th style="width: 30%;">Unlimited</th>
                                                                    <th style="width: 30%;">ECN</th>
                                                                </tr>
                                                            </thead>
                                                            <tr>
                                                                    <td>Deposit Awal</td>
                                                                    <td>$500</td>
                                                                    <td>$500</td>
                                                                    <td>$1000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Spread</td>
                                                                    <td>Fix Spread<br> 0 pip</td>
                                                                    <td>Floating spread<br> 0.2 pip</td>
                                                                    <td>Floating spread<br> -1 pip</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Komisi</td>
                                                                    <td>$20</td>
                                                                    <td>$0</td>
                                                                    <td>$6</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Leverage</td>
                                                                    <td>1 : 3000</td>
                                                                    <td>1 : 500</td>
                                                                    <td>1 : 500</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Max Order</td>
                                                                    <td>200</td>
                                                                    <td>Unlimited</td>
                                                                    <td>Unlimited</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Volume Order</td>
                                                                    <td>0,01 - 500 lots</td>
                                                                    <td>0,1 - 500 lots</td>
                                                                    <td>0,1 - 500 lots</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Market Execution</td>
                                                                    <td>0,3 sec, STP</td>
                                                                    <td>Eksekusi, STP</td>
                                                                    <td>ECN</td>
                                                                </tr>
                                                                
                                                                <tr >
                                                                    <td><strong><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Buka Akun</button></strong></td>
                                                                    <td><a href="<?= $broker['link']?>"  target="_blank"> <button type="button" class="btn btn-outline-<?= $broker['warnadasar']?> btn-lg btn-block">Akun Zero</button> </a></td>
                                                                    <td><a href="<?= $broker['link']?>" target="_blank"> <button type="button" class="btn btn-outline-<?= $broker['warnadasar']?> btn-lg btn-block">Akun Unlimited</button> </a></td>
                                                                    <td><a href="<?= $broker['link']?>" target="_blank"> <button type="button" class="btn btn-outline-<?= $broker['warnadasar']?> btn-lg btn-block">Akun ECN</button> </a></td>
                                                                    
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>