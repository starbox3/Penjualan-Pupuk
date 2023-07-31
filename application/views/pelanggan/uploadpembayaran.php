<section class="shoping-cart spad">
    <div class="container">
        <div class="col-lg-6">
            <?php $bank = $this->input->get('bank'); ?>
            <?= form_open_multipart('pelanggan/upload?bank=' . $bank); ?>
            <div class="shoping__checkout mt-0">
                <h5>Upload Bukti Pembayaran</h5>
                <ul>
                    <li>
                        Silahkan foto atau screenshoot bukti pembayaran.
                    </li>
                    <li>
                        <input type="file" id="myFile" name="file">
                    </li>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__btns">
                                <a href="<?= base_url('pelanggan/detailpembayaran?bank=' . $bank) ?>" class="primary-btn cart-btn">kembali</a>
                                <button type="submit" class="primary-btn cart-btn cart-btn-right">
                                    upload</button>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            </form>
        </div>
    </div>
</section>