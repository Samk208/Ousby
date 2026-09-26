"use client";

import { useState } from "react";
import { motion } from "framer-motion";
import {
  MapPin,
  Phone,
  Mail,
  MessageSquare,
  Send,
  CheckCircle,
  Clock,
} from "lucide-react";
import AnimatedSection from "@/components/AnimatedSection";

export default function ContactPage() {
  const [submitted, setSubmitted] = useState(false);
  const [form, setForm] = useState({
    name: "",
    email: "",
    subject: "",
    message: "",
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setSubmitted(true);
  };

  return (
    <div className="max-w-[1280px] mx-auto px-margin-page py-section-gap">
      {/* Header */}
      <AnimatedSection className="mb-12">
        <span className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
          Contact
        </span>
        <h1 className="font-heading text-[36px] md:text-[48px] font-bold text-primary mt-2 leading-[1.15]">
          Nous Contacter
        </h1>
        <p className="text-on-surface-variant text-[18px] mt-4 max-w-2xl">
          Écrivez-nous pour toute question, suggestion ou demande de
          collaboration. Notre équipe vous répondra dans les plus brefs délais.
        </p>
      </AnimatedSection>

      <div className="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
        {/* Contact Form */}
        <AnimatedSection className="lg:col-span-7">
          <div className="bg-surface-white border border-border-elegant rounded-lg p-8 soft-shadow">
            {submitted ? (
              <motion.div
                initial={{ opacity: 0, scale: 0.95 }}
                animate={{ opacity: 1, scale: 1 }}
                className="text-center py-12"
              >
                <CheckCircle className="text-primary mx-auto mb-4" size={48} />
                <h3 className="font-heading text-[24px] font-semibold text-deep-forest mb-2">
                  Message envoyé !
                </h3>
                <p className="text-on-surface-variant text-[16px]">
                  Merci pour votre message. Notre équipe vous répondra sous 48h.
                </p>
              </motion.div>
            ) : (
              <form onSubmit={handleSubmit} className="flex flex-col gap-5">
                <h2 className="font-heading text-[20px] font-semibold text-deep-forest mb-2">
                  Envoyer un message
                </h2>

                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div className="flex flex-col gap-1.5">
                    <label className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
                      Nom complet
                    </label>
                    <input
                      type="text"
                      required
                      value={form.name}
                      onChange={(e) =>
                        setForm({ ...form, name: e.target.value })
                      }
                      className="w-full bg-ivory-bg border border-border-elegant rounded-sm px-4 py-3 text-[15px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                      placeholder="Votre nom"
                    />
                  </div>
                  <div className="flex flex-col gap-1.5">
                    <label className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
                      Email
                    </label>
                    <input
                      type="email"
                      required
                      value={form.email}
                      onChange={(e) =>
                        setForm({ ...form, email: e.target.value })
                      }
                      className="w-full bg-ivory-bg border border-border-elegant rounded-sm px-4 py-3 text-[15px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                      placeholder="votre@email.com"
                    />
                  </div>
                </div>

                <div className="flex flex-col gap-1.5">
                  <label className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
                    Sujet
                  </label>
                  <select
                    value={form.subject}
                    onChange={(e) =>
                      setForm({ ...form, subject: e.target.value })
                    }
                    className="w-full bg-ivory-bg border border-border-elegant rounded-sm px-4 py-3 text-[15px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                  >
                    <option value="">Sélectionner un sujet</option>
                    <option value="general">Question générale</option>
                    <option value="media">Presse & médias</option>
                    <option value="rga">Adhésion RGA</option>
                    <option value="partenariat">Partenariat</option>
                    <option value="autre">Autre</option>
                  </select>
                </div>

                <div className="flex flex-col gap-1.5">
                  <label className="text-[12px] font-bold uppercase tracking-[0.05em] text-text-muted">
                    Message
                  </label>
                  <textarea
                    required
                    rows={5}
                    value={form.message}
                    onChange={(e) =>
                      setForm({ ...form, message: e.target.value })
                    }
                    className="w-full bg-ivory-bg border border-border-elegant rounded-sm px-4 py-3 text-[15px] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all resize-none"
                    placeholder="Votre message..."
                  />
                </div>

                <motion.button
                  type="submit"
                  whileHover={{ scale: 1.02 }}
                  whileTap={{ scale: 0.98 }}
                  className="inline-flex items-center justify-center gap-2 bg-primary text-surface-white px-8 py-3.5 rounded-sm font-bold text-[13px] uppercase tracking-[0.03em] hover:bg-primary-container transition-all"
                >
                  <Send size={16} /> Envoyer le message
                </motion.button>
              </form>
            )}
          </div>
        </AnimatedSection>

        {/* Sidebar */}
        <div className="lg:col-span-5 flex flex-col gap-6">
          {/* Contact Info */}
          <AnimatedSection className="bg-surface-white border border-border-elegant rounded-lg p-8 soft-shadow">
            <h3 className="font-heading text-[20px] font-semibold text-deep-forest mb-6">
              Informations de contact
            </h3>
            <div className="flex flex-col gap-5">
              <div className="flex items-start gap-3">
                <MapPin
                  className="text-primary-container mt-0.5 shrink-0"
                  size={20}
                />
                <div>
                  <span className="text-[14px] font-medium text-on-surface block">
                    Adresse
                  </span>
                  <span className="text-on-surface-variant text-[14px]">
                    Kaloum, Conakry, République de Guinée
                  </span>
                </div>
              </div>
              <div className="flex items-start gap-3">
                <Phone
                  className="text-primary-container mt-0.5 shrink-0"
                  size={20}
                />
                <div>
                  <span className="text-[14px] font-medium text-on-surface block">
                    Téléphone
                  </span>
                  <span className="text-on-surface-variant text-[14px]">
                    +224 627 249 666
                  </span>
                  <br />
                  <span className="text-on-surface-variant text-[14px]">
                    +224 628 440 873
                  </span>
                </div>
              </div>
              <div className="flex items-start gap-3">
                <Mail
                  className="text-primary-container mt-0.5 shrink-0"
                  size={20}
                />
                <div>
                  <span className="text-[14px] font-medium text-on-surface block">
                    Email
                  </span>
                  <span className="text-on-surface-variant text-[14px]">
                    contact@rga-guinee.org
                  </span>
                </div>
              </div>
              <div className="flex items-start gap-3">
                <Clock
                  className="text-primary-container mt-0.5 shrink-0"
                  size={20}
                />
                <div>
                  <span className="text-[14px] font-medium text-on-surface block">
                    Horaires
                  </span>
                  <span className="text-on-surface-variant text-[14px]">
                    Lun–Ven : 08h30–17h00
                  </span>
                </div>
              </div>
            </div>
          </AnimatedSection>

          {/* WhatsApp CTA */}
          <AnimatedSection className="bg-[#25D366] rounded-lg p-8 text-white text-center">
            <MessageSquare className="mx-auto mb-3" size={32} />
            <h3 className="font-heading text-[20px] font-semibold mb-2">
              Contactez-nous sur WhatsApp
            </h3>
            <p className="text-white/80 text-[14px] mb-5">
              Pour une réponse rapide, utilisez notre canal WhatsApp.
            </p>
            <a
              href="https://wa.me/224627249666"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-flex items-center justify-center gap-2 bg-white text-[#25D366] px-8 py-3 rounded-sm font-bold text-[13px] uppercase tracking-[0.03em] hover:bg-white/90 transition-colors"
            >
              Ouvrir WhatsApp
            </a>
          </AnimatedSection>
        </div>
      </div>
    </div>
  );
}
