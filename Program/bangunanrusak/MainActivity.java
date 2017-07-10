package com.example.tweleve.bangunanrusak;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button btnLihat, btnTambah, keluar;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // inisialisasi button/tombol
        btnLihat = (Button) findViewById(R.id.btLihat);
        btnTambah = (Button) findViewById(R.id.btTambah);
        keluar = (Button) findViewById(R.id.keluar);

        // even klik untuk menampilkan class SemuaAnggotaActivity
        btnLihat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Tampilkan semua anggota activity lewat intent
                Intent i = new Intent(getApplicationContext(),
                        TampilDataActivity.class);
                startActivity(i);
            }
        });

        // even klik menampilkan TambahAnggotaACtivity
        btnTambah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Tampilkan tambah anggota activity lewat intent
                Intent i = new Intent(getApplicationContext(),
                        TambahActivity.class);
                startActivity(i);
            }
        });

        keluar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
    }
}
