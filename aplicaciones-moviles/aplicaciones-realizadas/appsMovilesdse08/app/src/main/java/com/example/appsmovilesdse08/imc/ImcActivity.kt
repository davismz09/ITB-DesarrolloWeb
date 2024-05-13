package com.example.appsmovilesdse08.imc

import android.content.Intent
import android.os.Bundle
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.AppCompatButton
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.appsmovilesdse08.R
import com.google.android.material.floatingactionbutton.FloatingActionButton
import com.google.android.material.slider.RangeSlider

class ImcActivity : AppCompatActivity() {
    private lateinit var tvAltura: TextView
    private lateinit var tvPeso: TextView
    private lateinit var tvEdad: TextView
    private lateinit var rsAltura: RangeSlider
    private lateinit var btnRestarPeso: FloatingActionButton
    private lateinit var btnSumarPeso: FloatingActionButton
    private lateinit var btnRestarEdad: FloatingActionButton
    private lateinit var btnSumarEdad: FloatingActionButton
    private lateinit var btnCalcular: AppCompatButton
    private var pesoActual: Int = 70
    private var alturaActual: Int = 120
    private var edadActual: Int = 15

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_imc)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        inicializarComponentes()
        inicializarEventos()
    }

    private fun inicializarComponentes() {
        tvAltura = findViewById(R.id.tvAltura)
        tvPeso = findViewById(R.id.tvPeso)
        tvEdad = findViewById(R.id.tvEdad)
        rsAltura = findViewById(R.id.rsAltura)
        btnRestarPeso = findViewById(R.id.btnRestarPeso)
        btnSumarPeso = findViewById(R.id.btnSumarPeso)
        btnRestarEdad = findViewById(R.id.btnRestarEdad)
        btnSumarEdad = findViewById(R.id.btnSumarEdad)
        btnCalcular = findViewById(R.id.btnCalcular)
    }

    private fun inicializarEventos() {
        rsAltura.addOnChangeListener { _, value, _ ->
            alturaActual = value.toInt()
            tvAltura.text = "$alturaActual cm"
        }
        btnRestarPeso.setOnClickListener {
            pesoActual -= 1
            tvPeso.text = "$pesoActual kg"
        }
        btnSumarPeso.setOnClickListener {
            pesoActual += 1
            tvPeso.text = "$pesoActual kg"
        }

        btnRestarEdad.setOnClickListener {
            edadActual -= 1
            tvEdad.text = "$edadActual"
        }
        btnSumarEdad.setOnClickListener {
            edadActual += 1
            tvEdad.text = "$edadActual"
        }
        btnCalcular.setOnClickListener {
            val altura: Float = alturaActual.toFloat() / 100.0f
            val imc: Float = pesoActual.toFloat() / (altura * altura)
            val intentImc = Intent(this, ResultadoImcActivity::class.java)
            intentImc.putExtra("IMC_RESULTADO", imc)
            startActivity(intentImc)
        }

    }
}

