function loadGoogleTranslate() {
  new google.translate.TranslateElement(
    {
      pageLanguage: "en",
      autoDisplay: "true",
      includedLanguages: "mr,hi,en",
    },

    "google_translate_element"
  );
}
