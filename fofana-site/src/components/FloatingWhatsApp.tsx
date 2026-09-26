"use client";

import { motion } from "framer-motion";
import { MessageCircle } from "lucide-react";

export default function FloatingWhatsApp() {
  return (
    <motion.a
      href="https://wa.me/224627249666"
      target="_blank"
      rel="noopener noreferrer"
      initial={{ scale: 0, opacity: 0 }}
      animate={{ scale: 1, opacity: 1 }}
      whileHover={{ scale: 1.1 }}
      whileTap={{ scale: 0.9 }}
      transition={{ type: "spring", stiffness: 300, damping: 20 }}
      className="fixed bottom-6 right-6 z-50 flex items-center gap-2.5 bg-[#25D366] text-white px-4 py-3 rounded-full shadow-2xl hover:shadow-[#25D366]/40 border border-white/20 group"
      aria-label="Contacter sur WhatsApp"
    >
      <div className="relative">
        <MessageCircle size={22} className="fill-white text-[#25D366]" />
        <span className="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-secondary-container animate-ping" />
        <span className="absolute -top-1 -right-1 w-2.5 h-2.5 rounded-full bg-secondary-container" />
      </div>
      <span className="text-[13px] font-bold tracking-wide hidden sm:inline-block pr-1 font-body">
        WhatsApp Officiel
      </span>
    </motion.a>
  );
}
