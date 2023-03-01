<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parkir extends AUTH_Controller {

	public function index()
	{
		$data = array(
			'title'		=> 'Data Parkir',
			'dataParkir'=> $this->M_parkir->select()->result()
		);
		$this->backend->views('admin/parkir', $data);
	}

	public function keluar($id_transaksi = null)
	{
		if ($id_transaksi){
			$cekData = $this->M_parkir->select(['id_transaksi' => $id_transaksi])->row();
			$first_date = new DateTime($cekData->jam_masuk);
			$second_date = new DateTime(date('Y-m-d H:i:s'));

			$difference = $first_date->diff($second_date);

			$total_jam_hari = $difference->format("%d") * 24;
			$total_jam		= $difference->format('%h');

			// echo $total_jam;
			$total = 2000 * ($total_jam_hari + $total_jam);
			$query = $this->M_parkir->update(['jam_keluar' => date('Y-m-d H:i:s'), 'harga' => $total], ['id_transaksi' => $id_transaksi]);

			if($query){
				echo "<script>alert('Keluar kendaraan berhasil')</script>
				<meta http-equiv='refresh' content='0;./'>";
			}else{
				echo "<script>alert('Keluar kendaraan gagal');</script>
				<meta http-equiv='refresh' content='0;./'>";
			}
		}else{
			redirect('admin/parkir');
		}
	}

	public function hapus($id_transaksi = null)
	{
		if ($id_transaksi){
			$query = $this->M_parkir->delete(['id_transaksi' => $id_transaksi]);

			if($query){
				echo "<script>alert('Data berhasil dihapus')</script>
				<meta http-equiv='refresh' content='0;./'>";
			}else{
				echo "<script>alert('Data berhasil dihapus');</script>
				<meta http-equiv='refresh' content='0;./'>";
			}
		}else{
			redirect('admin/parkir');
		}
	}
}
