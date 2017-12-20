							<?php 
								$hide = "";
								if($loaitaikhoan == 0)
									$hide = "display:none";
							?>
 <br />
                                <a href="../Admin/listproduct.php" class="btn btn-primary" role="button" style="<?= $hide; ?>">Quản trị</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </form>
</body>
</html>

<?php $conn->close() ?>