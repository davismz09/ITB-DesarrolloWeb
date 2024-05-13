package com.example.rickandmortyapi.api

import retrofit2.Response
import retrofit2.http.GET
import retrofit2.http.Url

interface ApiServices {
    @GET
    suspend fun getPersonajes(@Url url: String): Response<PersonajesResponse>
}
