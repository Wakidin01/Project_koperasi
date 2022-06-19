<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 col-md-12 order-1">
                  <div class="row">

                    <div class="col-lg-3 col-md-3 col-3 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex pt-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/assets/img/icons/unicons/chart-success.png" alt="chart success" />
                            </div>
                            <div>
                              <small class="text-muted d-block">Profit</small>
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$12,628</h6>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> 72.8%</small>
                              </div>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-3 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex pt-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" />
                            </div>
                            <div>
                              <small class="text-muted d-block">Sales</small>
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$4,679</h6>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> 28.42%</small>
                              </div>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-3 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex pt-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/assets/img/icons/unicons/paypal.png" alt="Credit Card" />
                            </div>
                            <div>
                              <small class="text-muted d-block">Payments</small>
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$2,456</h6>
                                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                    <div class="col-3 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex pt-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/assets/img/icons/unicons/wallet.png" alt="User" />
                            </div>
                            <div>
                              <small class="text-muted d-block">Total Balance</small>
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$459.10</h6>
                                <small class="text-success fw-semibold">
                                  <i class="bx bx-up-arrow-alt"></i>
                                  42.9%
                                </small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                
              </div>




              
                <div class="row">
                <div class="col-lg-12 col-md-12 order-1">
                <div class="row">
                <!-- Expense Overview -->
                <div class="col-md-8 col-lg-8 order-1 mb-8">
                  <div class="card h-100">
                    
                      

                  
                    <div class="d-flex ">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Congratulations "<?php echo"$ru[nm_user]" ?>" 🎉</h5>
                          <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>


                    <div class="card-body">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                          <div id="incomeChart"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-4 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Transactions</h5>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="transactionID"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Paypal</small>
                              <h6 class="mb-0">Send money</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+82.6</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Wallet</small>
                              <h6 class="mb-0">Mac'D</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+270.69</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Transfer</small>
                              <h6 class="mb-0">Refund</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+637.91</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/assets/img/icons/unicons/cc-success.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Credit Card</small>
                              <h6 class="mb-0">Ordered Food</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">-838.71</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Wallet</small>
                              <h6 class="mb-0">Starbucks</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+203.33</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Mastercard</small>
                              <h6 class="mb-0">Ordered Food</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">-92.45</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
              </div>
             </div>

            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Koperasi Rakyat Sejahtera
                  
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>